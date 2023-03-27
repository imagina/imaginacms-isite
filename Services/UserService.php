<?php

namespace Modules\Isite\Services;

use Modules\User\Entities\Sentinel\User;
use Modules\User\Repositories\UserRepository;
use Modules\User\Repositories\UserTokenRepository;

class UserService
{

    private $userTokenRepository;

    public function __construct(
        UserTokenRepository $userTokenRepository
    ){
      $this->userTokenRepository = $userTokenRepository;
    }
   
    public function create(array $data)
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
        $this->userTokenRepository->generateFor($user->id);
        
        return [
            "user" => $user,
            "credentials" => [
                "email" => $data["email"],
                "password" => $password
            ]
        ];

    }


  

}