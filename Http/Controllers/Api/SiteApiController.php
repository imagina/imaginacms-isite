<?php

namespace Modules\Isite\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;
use Modules\Isite\Entities\Site;
use Modules\Isite\Transformers\SiteTransformer;
use Modules\Setting\Repositories\SettingRepository;

class SiteApiController extends BaseApiController
{
  /**
   * @var PaypalconfigRepository
   */

  private $setting;
  public function __construct(SettingRepository $setting)
  {
    
    $this->setting=$setting;
  }
  
  /**
   * GET ITEMS
   *
   * @return mixed
   */
  public function index(Request $request)
  {
    try {
      //Request to Repository
      $site = new Site();
      //Response
      
      $response = ["data" => new SiteTransformer($site->getData()->siteSettings)];
      
    } catch (\Exception $e) {
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    
    //Return response
    return response()->json($response, $status ?? 200);
  }
  
  /**
   * UPDATE ITEM
   *
   * @param $criteria
   * @param Request $request
   * @return mixed
   */
  public function update(Request $request)
  {
    \DB::beginTransaction(); //DB Transaction
    try {
  
      $data = $request->input('attributes');
  
  
  
      $allowedSettings = config('asgard.isite.config.allowedSettings');
      $imageSettings = config('asgard.isite.config.imageSettings');
      $this->saveImages($data,$allowedSettings,$imageSettings);

      foreach ($data as $key => $val)
        if(in_array($key,$allowedSettings))
          $newData[$key] = $val;
      
      
      $this->setting->createOrUpdate(["isite::siteSettings" => $newData]);
      
      //Response
      $response = ["data" => 'Item Updated'];
      \DB::commit();//Commit to DataBase
    } catch (\Exception $e) {
      \DB::rollback();//Rollback to Data Base
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    
    //Return response
    return response()->json($response, $status ?? 200);
  }
  
  private function saveImages(&$data,$allowedSettings,$imageSettings){
      foreach($data as $key=>$value){
        if (is_array($value)){
          $this->saveImages($value,$allowedSettings,$imageSettings);
        }else{
          if(in_array($key,$allowedSettings) && in_array($key,$imageSettings)){
            $requestimage = $data[$key];
            if (($requestimage == NULL) || (!empty($requestimage)))
              $data[$key] = saveImage($requestimage, "assets/isite/".$key.".jpg");
          }
        }
      
      }
    
  }
  
}
