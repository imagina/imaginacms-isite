<?php

namespace Modules\Isite\Events\Handlers;

use Modules\Isite\Entities\Organization;

// Events
use Modules\Isite\Events\OrganizationWasCreated;
use Modules\Isite\Services\TenantService;

class CreateOrganizationByRole
{
  public $tenantService;
  
  public function __construct(TenantService $tenantService)
  {
    $this->tenantService = $tenantService;
  }
  
  public function handle($event)
  {
    try {
      $user = $event->user;
      $data = $event->bindings;
      
      $roles = $user->roles;
      
      $rolesToTenant = json_decode(setting("isite::rolesToTenant",null,"[]"));
      
      $allReadyTenant = Organization::where("user_id",$user->id)->first();

      foreach ($roles as $userRole){
        if(in_array($userRole->id,$rolesToTenant) && !$allReadyTenant){
          $allReadyTenant = true;
          
          $organization = $this->tenantService->createTenant([
            "user" => $user,
            "title" => $user->present()->fullname,
            "domain" => $data["organization"]["domain"] ?? null,
            "role" => $userRole,
            "organization" => $data["organization"] ?? []
          ]);

          tenancy()->initialize($organization->id);

          event(new OrganizationWasCreated($organization));

        }
      }
      
    } catch (\Exception $e) {
      \Log::info($e->getMessage().' '.$e->getFile().' '.$e->getLine());
    }
    
  }
  
  
}
