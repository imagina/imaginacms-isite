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

  public function organizationIndex(Request $request,$subDomain){
  
    $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

    $routeAlias = setting("isite::tenantRouteAlias",null,null);
    
    if(isset(tenant()->id) && $routeAlias){
      if(tenant()->status){
        return redirect(tenant_route($request->getHost(), $locale . '.'.$routeAlias));
      }
    }
    
    return redirect()->route("homepage");
    
  }
  
  public function header(){
    return view('isite::frontend.header');
  }
  
  public function footer(){
    return view('isite::frontend.footer');
  }
  
  public function pdf(){
    \Artisan::call('view:clear');
    $repository = app("Modules\\Iforms\\Repositories\\LeadRepository");
    //Set fields and extra params
    $params = [
      "include" => [],
      "take" => 12,
      "filter" => [
        "id" => 61
      ]
    ];
    //Get query
    $items = $repository->getItemsBy(json_decode(json_encode($params)));
    
    $pdf = \PDF::loadView('isite::pdf.layouts.default', ["data" => [
      "items" => $items,
      "content" => "iforms::pdf.leadItem",
      ]]);
    return $pdf->stream('invoice.pdf');
    return view('isite::pdf.layouts.default', ["data" => [
      "items" => $items,
      "content" => "iforms::pdf.leadItem",
    ]]);
  }
}
