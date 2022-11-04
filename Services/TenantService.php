<?php


namespace Modules\Isite\Services;

use Modules\Iprofile\Entities\Role;
use Modules\Iprofile\Http\Controllers\Api\AuthApiController;
use Modules\Isite\Entities\Module;
use Modules\Isite\Entities\Organization;
use Modules\Core\Console\Installers\Scripts\UserProviders\SentinelInstaller;
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
    $this->activatePlan(array_merge($data, ["organization_id" => $organization->id, "role" => $role]));
    
    //Seed again Page and Menu to enable the sidebar in the iadmin
    $this->reseedPageAndMenu(array_merge($data, ["organization_id" => $organization->id, "role" => $role]));
    
    
    //Authenticating user in the Tenant DB
    $authData = $this->authenticateUser(array_merge($userCentralData, ["organization_id" => $organization->id]));

    
    \Log::info("----------------------------------------------------------");
    \Log::info("Tenant {{$organization->id}} successfully created");
    \Log::info("----------------------------------------------------------");
    

    return [
      "credentials" => $userCentralData,
      "authData" => $authData,
      "organization" => $organization,
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
      
      \Log::info("Activating Plan: $plan");
      
      if (in_array($plan, $plans)) {
        
        foreach ($modules as $module) {
          $moduleName = ucfirst($module);
          \Artisan::call('db:seed', ['--class' => "Modules\\$moduleName\Database\Seeders\\" . $moduleName . "ModuleTableSeeder"]);
          \Log::info(\Artisan::output());
          \Artisan::call('module:migrate', ['module' => $moduleName]);
          \Log::info(\Artisan::output());
          \Artisan::call('module:seed', ['module' => $moduleName]);
          \Log::info(\Artisan::output());
        }
  
        \Log::info("----------------------------------------------------------");
        \Log::info("Turn on all modules permissions for the Admin Role in the Tenant DB for the plan: $plan");
        \Log::info("----------------------------------------------------------");
        $this->activateModulesPermissionsInRole($modules, $data["role"]);
        
      }
    }
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
}