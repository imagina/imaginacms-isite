<?php


namespace Modules\Isite\Services;

use Modules\Iprofile\Entities\Role;
use Modules\Iprofile\Http\Controllers\Api\AuthApiController;
use Modules\Isite\Entities\Module;
use Modules\Isite\Entities\Organization;
use Modules\Core\Console\Installers\Scripts\UserProviders\SentinelInstaller;
use Modules\Isite\Transformers\OrganizationTransformer;
use Modules\User\Entities\Sentinel\User;
use Modules\User\Repositories\UserRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Cartalyst\Sentinel\Roles\EloquentRole;
use Modules\Iprofile\Entities\Setting;

class TenantService
{
  public $sentinelInstaller;
  private $application;
  
  
  public function createTenant($data)
  {
    
    \Log::info("----------------------------------------------------------");
    \Log::info("Creating Organization...");
    \Log::info("----------------------------------------------------------");
    
    if (!isset(tenant()->id))
      if (isset($data["organization_id"])) {
        tenancy()->initialize($data["organization_id"]);
      }
    
    $organization = Organization::create(array_merge([
      'user_id' => $data["user"]->id,
      'title' => $data["title"] ?? $data["user"]->present()->fullname,
      'status' => $data["status"] ?? json_decode(setting("isite::defaultTenantStatus", null, "true")),
      'layout_id' => $data["layout_id"] ?? json_decode(setting("isite::defaultLayout", null, null))
    ], $data["organization"] ?? $data["extraData"] ?? []));
    
    Storage::disk("privatemedia")->makeDirectory("organization" . $organization->id);
    Storage::disk("local")->makeDirectory("/storage/organization" . $organization->id);
    Storage::disk("public")->makeDirectory("organization" . $organization->id);
    Storage::disk("publicmedia")->makeDirectory("organization" . $organization->id);
    
    if (isset($data["role"]->id) || isset($data["role_id"]))
      $organization->users()->sync([$data["user"]->id => ['role_id' => $data["role"]->id ?? $data["role_id"]]]);
    
    $organization->domains()->create([
      'domain' => $data["organization"]["domain"] ?? $data["domain"] ?? $organization->slug,
      'type' => 'default'
    ]);
  
    \Log::info("----------------------------------------------------------");
    \Log::info("Created Organization: ".$organization->title. " | Domain: ".$organization->domain);
    \Log::info("----------------------------------------------------------");
    
    return $organization;
  }
  
  public function createUser($data)
  {
    
    if (!isset(tenant()->id))
      if (isset($data["organization_id"]))
        tenancy()->initialize($data["organization_id"]);
    
    $password = $data["password"] ?? Str::random(16);
    $info = [
      'first_name' => $data["first_name"] ?? "temporal first name",
      'last_name' => $data["last_name"] ?? "temporal last name",
      'email' => $data["email"],
      'password' => $password,
    ];
    
    $user = app(UserRepository::class)->createWithRolesFromCli($info, [$data["role"]->id ?? 1], true);
    app(\Modules\User\Repositories\UserTokenRepository::class)->generateFor($user->id);
    
    return [
      "user" => $user,
      "credentials" => [
        "email" => $data["email"],
        "password" => $password
      ]
    ];
  }
  
  /**
   * CREATE TENANT MULTIDB
   * required attributes
   *[
   *  email,
   *  name,
   *  plan(blog | icommerce) array or string,
   *  layout_id
   *
   * ]
   *
   * optional Attributes
   * [
   * password,
   * role, string slug
   * ]
   * @param Request $request
   * @return mixed
   */
  public function createTenantInMultiDatabase($data)
  {
    
    //central role
    if (isset($data["role"]) && !empty($data["role"])) {
      $role = Role::where("slug", $data["role"])->first();
    }
    
    if (!isset($role->id)) {
      $role = Role::where("slug", config("tenancy.defaultCentralRole"))->first();
    }
    
    
    //Create the user in current DB
    \Log::info("----------------------------------------------------------");
    \Log::info("Creating central user with email: ".$data["email"]);
    \Log::info("----------------------------------------------------------");
    $userCentralData = $this->createUser(array_merge($data, ["role" => $role]));
  
    
    //Create organization
    $organization = $this->createTenant(array_merge($data, ["user" => $userCentralData["user"]]));
    $domain = $organization->domain;
    
    
    //Initializing Tenant
    \Log::info("----------------------------------------------------------");
    \Log::info("Initializing Tenant ID: $organization->id");
    \Log::info("----------------------------------------------------------");
    tenancy()->initialize($organization->id);
  
    
    //Post install commands
    $this->postInstallCommands(["organization_id" => $organization->id]);
  
  
    //Migrate Core modules
    $this->migrateCoreModules(["organization_id" => $organization->id]);
  
  
    //seed User Module in the Tenant DB
    $this->configureUserModule(["organization_id" => $organization->id]);
    
    
    //create user in Tenant DB
    \Log::info("----------------------------------------------------------");
    \Log::info("Creating User in the Tenant DB");
    \Log::info("----------------------------------------------------------");
    $tenantUser = $this->createUser(array_merge($data, [
      "role" => $role,
      "password" => $userCentralData["credentials"]["password"],
      "organization_id" => $organization->id
    ]));
  
    
    //seeding Core Modules
    $this->seedCoreModules(["organization_id" => $organization->id, "user" => $tenantUser["user"]]);
    
    
    //finding admin Role seeded in the previous sentence
    \Log::info("----------------------------------------------------------");
    \Log::info("Assign Admin Role for the user un the Tenant DB");
    \Log::info("----------------------------------------------------------");
    $role = Role::where("slug", "admin")->first();
    $tenantUser["user"]->roles()->sync([$role->id]);
  
  
  
    \Log::info("----------------------------------------------------------");
    \Log::info("Turn on all core module permissions for the Admin Role in the Tenant DB ");
    \Log::info("----------------------------------------------------------");
    $this->activateModulesPermissionsInRole(config("asgard.core.config.CoreModules"), $role);
    
    
    //Setting the work Space to the admin role seeded in the Tenant DB
    \Log::info("----------------------------------------------------------");
    \Log::info("Setting the work Space to the admin role seeded in the Tenant DB");
    \Log::info("----------------------------------------------------------");
    $setting = new Setting([
      "related_id" => $role->id,
      "entity_name" => "role",
      "name" => "workSpace",
      "value" => "iadmin",
    ]);
    $setting->save();
    
    
    //Activate the modules of the plan in the Tenant DB
    if(isset($data['plan']) && !is_null($data['plan'])){

      $this->activatePlan(array_merge($data, ["organization_id" => $organization->id, "role" => $role]));
      
    }else{
      
      //Validation config layout
      if(isset($data['layout']) && !is_null($data['layout'])){

        //Get layout configuration
        $layoutConfig = config("tenancy.layouts.".$data['layout']);

        //Set plan value
        $data['plan'] =  $layoutConfig['plan'];
        $this->activatePlan(array_merge($data, ["organization_id" => $organization->id, "role" => $role]));
      
        //Proccess to clone DB and Media
        $this->cloneTenancyLayout($data,$layoutConfig,$organization);

      }else{
        \Log::info("Layout configuration is NULL");
      }

    }
    
    
    
    //Authenticating user in the Tenant DB
    $authData = $this->authenticateUser(array_merge($userCentralData, ["organization_id" => $organization->id]));

    
    \Log::info("----------------------------------------------------------");
    \Log::info("Tenant {{$organization->id}} successfully created");
    \Log::info("----------------------------------------------------------");

    return [
      "credentials" => $userCentralData["credentials"],
      "authData" => $authData,
      "organization" => new OrganizationTransformer($organization),
      "redirectUrl" => "https://".$domain . "/iadmin?authbearer=" . str_replace("Bearer ", "",$authData->data->bearer)."&expiresatbearer=".urlencode($authData->data->expiresDate)
    ];
  }
  
  public function authenticateUser($data)
  {
  
    \Log::info("----------------------------------------------------------");
    \Log::info("Authenticating user in the Tenant DB");
    \Log::info("----------------------------------------------------------");
    
    if (!isset(tenant()->id))
      tenancy()->initialize($data["organization_id"]);
    
    $authApiController = app(AuthApiController::class);
    
    return json_decode($authApiController->authAttempt($data["credentials"])->content());
    
  }
  
  public function activatePlan($data)
  {
  
    \Log::info("----------------------------------------------------------");
    \Log::info("Activating Plan Modules");
    \Log::info("----------------------------------------------------------");
    
    if (!isset(tenant()->id))
      tenancy()->initialize($data["organization_id"]);
    
    $allPlans = config("tenancy.plans");
    !is_array($data["plan"]) ? $plans = [$data["plan"]] : false;
    
    foreach ($allPlans as $plan => $modules) {
      if (in_array($plan, $plans)) {
        
        \Log::info("Activating Plan: $plan");
        $this->activateModule(["organization_id" => $data["organization_id"], "module" => $modules]);
        
      }
    }

    //Active extra modules
    if(isset($data["module"]) && !empty($data["module"]))
      $this->activateModule($data);
    

  }
  
  public function activateModule($data){
  
    if(!isset($data["module"]) || !isset($data["organization_id"])){
      throw new \Exception("Missing module or organization_id parameters",400);
    }
    
    \Log::info("----------------------------------------------------------");
    \Log::info("Activating Module");
    \Log::info("----------------------------------------------------------");
  
    if (!isset(tenant()->id))
      tenancy()->initialize($data["organization_id"]);
    
    $module = $data["module"];
      !is_array($module) ? $module = [$module] : false;
  
      foreach ($module as $moduleName) {
        $moduleName = ucfirst($moduleName);
        \Log::info("Activating Module: $moduleName");
        \Artisan::call('db:seed', ['--class' => "Modules\\$moduleName\Database\Seeders\\" . $moduleName . "ModuleTableSeeder"]);
        \Log::info(\Artisan::output());
        \Artisan::call('module:migrate', ['module' => $moduleName]);
        \Log::info(\Artisan::output());
        \Artisan::call('module:seed', ['module' => $moduleName]);
        \Log::info(\Artisan::output());
  
        \Log::info("----------------------------------------------------------");
        \Log::info("Turn on all modules permissions for the Admin Role in the Tenant DB for the module: $moduleName");
        \Log::info("----------------------------------------------------------");
  
        $role = Role::where("slug", "admin")->first();
        $this->activateModulesPermissionsInRole($moduleName, $data["role"] ?? $role);
      }
      $this->reseedPageAndMenu($data);
  }
  
  public function migrateCoreModules($data)
  {
  
  
    \Log::info("----------------------------------------------------------");
    \Log::info("Migrating Core Modules");
    \Log::info("----------------------------------------------------------");
    
    if (!isset(tenant()->id))
      tenancy()->initialize($data["organization_id"]);
    
    $coreModules = config("asgard.core.config.CoreModules");
    
    foreach ($coreModules as $module) {
      \Artisan::call('module:migrate', ['module' => $module]);
      \Log::info(\Artisan::output());
    }
    
    
  }
  
  public function seedCoreModules($data)
  {
    
    \Log::info("----------------------------------------------------------");
    \Log::info("Seeding Core Modules");
    \Log::info("----------------------------------------------------------");
    
    if (!isset(tenant()->id))
      tenancy()->initialize($data["organization_id"]);
    
    $coreModules = config("asgard.core.config.CoreModules");
    
    foreach ($coreModules as $module) {
      \Artisan::call('module:seed', ['module' => $module]);
      \Log::info(\Artisan::output());
    }

  }
  
  public function activateModulesPermissionsInRole($modules, Role $role){
  
    (!is_array($modules)) ? $modules = [$modules] : false;
    
    $modules = Module::whereIn("alias",$modules)->get();
    
    $allPermissions = [];
    
    foreach ($modules as $module){
      $modulePermissions = [];
      foreach ($module->permissions ?? [] as $entity => $permissions){
        foreach ($permissions as $action => $permission){
          $allPermissions[$entity.".$action"] = true;
        }
      }
    }
    
    $role->permissions = array_merge($allPermissions,$role->permissions ?? []);
  
    $role->save();
    
  }
  
  public function configureUserModule($data)
  {
    
    \Log::info("----------------------------------------------------------");
    \Log::info("Configuring User Module");
    \Log::info("----------------------------------------------------------");
    
    if (!isset(tenant()->id))
      tenancy()->initialize($data["organization_id"]);
    
    $userProvider = app(SentinelInstaller::class);
    
    $userProvider->configure();
    
    \Artisan::call('module:migrate', ['module' => 'User']);
    \Log::info(\Artisan::output());
    \Artisan::call('module:seed', ['module' => 'User']);
    \Log::info(\Artisan::output());
    \Artisan::call('db:seed', ['--class' => 'Modules\Iprofile\Database\Seeders\RolePermissionsSeeder']);
    \Log::info(\Artisan::output());
    
  }
  
  public function postInstallCommands($data)
  {
    
    \Log::info("----------------------------------------------------------");
    \Log::info("Post Install Commands");
    \Log::info("----------------------------------------------------------");
    
    if (isset($data["organization_id"]))
      tenancy()->initialize($data["organization_id"]);
    
    $postCommands = [
      ["commandname" => "migrate", '--tenants' => [tenant()->id]],
      ["commandname" => "key:generate", '--tenants' => [tenant()->id]],
      ["commandname" => "passport:install", '--tenants' => [tenant()->id]]
    ];
    exec("export APP_RUNNING_IN_CONSOLE=true");
    foreach ($postCommands as $options) {
      \Log::info($options);
      \Artisan::call('tenants:run', $options);
      \Log::info(\Artisan::output());
    }
    
  }
  
  public function reseedPageAndMenu($data)
  {
    
    \Log::info("----------------------------------------------------------");
    \Log::info("Reseed Page and Menu");
    \Log::info("----------------------------------------------------------");
    
    if (isset($data["organization_id"]))
      tenancy()->initialize($data["organization_id"]);
    
    \Artisan::call('module:seed', ['module' => 'Page']);
    \Log::info(\Artisan::output());
    \Artisan::call('module:seed', ['module' => 'Menu']);
      \Log::info(\Artisan::output());
  }

  public function cloneTenancyLayout(array $data,array $layoutConfig,object $organization)
  {
    \Log::info("----------------------------------------------------------");
    \Log::info("Clone Tenancy Layout Proccess");
    \Log::info("----------------------------------------------------------");

    $orgId = $layoutConfig['organizationId'];
    \Log::info("Layout - OrganizationId: ".$orgId);

    //Tenant donde esta guardado el layout
    $orgLayout = \DB::connection("mysql")->table("isite__organizations")
    ->where("id",$orgId)
    ->first();

    // Process DB
    $this->cloneTenancyDB($orgLayout,$organization);

    // Process Media
    $this->cloneTenancyMedia($orgId,$organization);
    
  }

  public function cloneTenancyDB(object $orgLayout,object $organization)
  {

    \Log::info("========== Clone Tenancy DB ==========");

    $dataToConnect = json_decode($orgLayout->data);
    \Log::info("Connect to Tenancy DB Name: ".$dataToConnect->tenancy_db_name);

    // Get mysql data to connection
    $dataMySql = config('database.connections.mysql');
    $dataMySqlTenant = [
      "database" => $dataToConnect->tenancy_db_name,
      "username" => $dataToConnect->tenancy_db_username,
      "password" => $dataToConnect->tenancy_db_password
    ];

    // Add new data
    $newDataConnection = array_merge($dataMySql,$dataMySqlTenant);

    // Set new connection
    config(['database.connections.newConnectionTenant' => $newDataConnection]);
    \DB::purge('newConnectionTenant');
    \DB::reconnect('newConnectionTenant');
    
    // Get tables to new connection
    $tables = \DB::connection("newConnectionTenant")->select("SHOW TABLES");
    \Log::info("Tables Total: ".count($tables));
    \Log::info("Preparing to copy in OrganizationId: ".$organization->id);

    //Only name tables
    $tables = array_map('current',$tables);

    $this->checkTablesAndCopy($tables,$organization);
    
    // Esto creo q no es necesario
    //\DB::disconnect('newConnectionTenant');

    \Log::info("========== Clone Tenancy DB FINISHED ==========");

  }

  public function checkTablesAndCopy(array $tables,object $organization){

    // Desactive validation to insert data from organization layout
    \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    $notIncludeTables = config("tenancy.notIncludeTablesToCopy");

    // Check tables
    foreach($tables as $table)
    {
      
      if(!in_array($table,$notIncludeTables)){
        // Get all data
        $dataToCopy = \DB::connection("newConnectionTenant")->select("SELECT * FROM ".$table);
        if(!is_null($dataToCopy) && count($dataToCopy)>0){
          \Log::info("Copying data from Table: ".$table);
  
          //Data to copy in each row
          foreach ($dataToCopy as $data) {

            $data = (array)$data;

            //Change organization id if exist
            if(isset($data['organization_id']) && !is_null($data['organization_id']))
                $data['organization_id'] = $organization->id;

            //search if exist id
            $existId = \DB::table($table)->select("id")->where("id","=",$data["id"])->get();
            
            //Not exist , so insert data
            if(count($existId)==0){
              \DB::table($table)->insert($data);
            }else{
              //Extra validations
              $this->validationPages($table,$data);
            }
            
          }
        }
      }

    }

    // Active again
    \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

  }


  public function validationPages(string $table, array $data)
  {

    if($table=="page__pages"){
      //Only pages Home, Us , Contact
      if($data['id']==1 || $data['id']==2 || $data['id']==3){
        //Update
        \DB::table($table)->where("id","=",$data['id'])->update([
          "template" => $data["template"],
          "system_name"=> $data["system_name"],
          "organization_id"=> $data["organization_id"]
        ]);
      }
    }

  }

  public function cloneTenancyMedia(int $orgIdLayout,object $organization)
  {
    \Log::info("========== Clone Tenancy MEDIA ==========");

    $source = public_path('organization'. $orgIdLayout.'/assets/media');
    $to = public_path('organization'. $organization->id.'/assets/media');  

    \Log::info("Copy - source: ".$source);
    \Log::info("Copy - to: ".$to);

    \File::copyDirectory($source, $to);

    \Log::info("========== Clone Tenancy MEDIA FINISHED ==========");
  }

}