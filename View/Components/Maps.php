<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;
use Modules\Media\Entities\File;
use Modules\Setting\Entities\Setting;

class Maps extends Component
{
//  public $optionMap;
  public $lat;
  public $lng;
  public $title;
  public $locationName;
  public $classes;
  public $zoom;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($lat, $lng, $locationName = 'Ubicacion', $title = 'Mapa', $zoom = 16, $classes = '')
  {
    $this->lat = $lat;
    $this->lng = $lng;
    $this->locationName = $locationName;
    $this->title = $title;
    $this->zoom = $zoom;
    $this->classes = $classes;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public
  function render()
  {
    return view("isite::frontend.components.maps");
  }
}