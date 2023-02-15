<?php

namespace Modules\Isite\Services;

use Modules\Setting\Repositories\SettingRepository;

class SettingService
{

    private $settingRepository;

    public function __construct(
        SettingRepository $settingRepository
    ){
      $this->settingRepository = $settingRepository;
    }
   
    public function updateSettings(array $data,object $organization)
    {
        
        \Log::info("========== Update Settings ==========");

        //Site Name - Translatable
        $siteName = $data["title"] ?? "My Site";
        $this->updateSetting("core::site-name",$siteName,true);

    }


    public function updateSetting($name,$newValue,$translatable = null)
    {

        $setting = $this->settingRepository->findByName($name,false);

        if(!is_null($setting) && !empty($setting)){
            
            if(is_null($translatable)){
                $setting->update(['plainValue' => $newValue]);
            }else{
                $setting->translate('en')->value = $newValue;
                $setting->translate('es')->value = $newValue;
                $setting->save();
            }
           
        }

    }

}