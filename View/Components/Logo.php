<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;

class Logo extends Component
{

  public $logo;
  public $to;
  public $zone;
  public $imgClasses;
  public $linkClasses;
  public $central;
  public $moduleName;
  public $settingName;
  public $nameBock;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($name = "logo1", $to = null, $imgClasses = "", $linkClasses = "", $central = false,
                              $nameBock = null)
  {

    $this->to = $to ?? \LaravelLocalization::localizeUrl('/');
    $this->imgClasses = $imgClasses;
    $this->linkClasses = $linkClasses;
    $this->moduleName = "isite";
    $this->settingName = $nameBock ?? $name;
    $this->zone = "isite::$this->settingName";
    $setting = $this->getSettingRepository()->findByName($this->zone, $central);

    if (isset($setting->id)) {
      $this->logo = $setting;
    }
  }

  private function getSettingRepository()
  {
    return app("Modules\Setting\Repositories\SettingRepository");
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('isite::frontend.components.logo');
  }
}
