<?php

namespace Modules\Isite\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Mockery\CountValidator\Exception;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Iprofile\Repositories\UserApiRepository;
use Route;
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

class PublicController extends BaseApiController
{
  protected $auth;
  
  public function __construct(
  )
  {
    parent::__construct();
  }

  public function header(){
    return view('isite::frontend.header');
  }
  
  public function footer(){
    return view('isite::frontend.footer');
  }
}
