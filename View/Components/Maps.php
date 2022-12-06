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
  public $id;
  public $mapId;
  public $settingMap;
  public $inModal;
  public $mapWidth;
  public $mapHeight;
  public $layout;
  public $view;
  public $locations;
  public $mapStyle;
  public $centerLat;
  public $centerLng;
  public $imageIcon;
  public $maxZoom;
  public $minZoom;
  public $markerMapClasses;
  public $iconWidth;
  public $iconHeight;
  public $iconMarginLeft;
  public $iconMarginTop;
  public $mapEvent;
  public $inputLocation;
  public $withTitle;
  public $alignTitle;
  public $fontSizeTitle;
  public $colorTitle;
  public $colorTitleByClass;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($lat = '11111111', $lng = '22222222', $locationName = 'Ubicacion', $title = 'Mapa',
                              $zoom = 16, $classes = '', $id = 1, $mapId = null, $inModal = false, $mapWidth = '100%',
                              $mapHeight = '314px', $layout = 'map-layout-1', $locations = [], $view = null,
                              $imageIcon = null, $mapStyle = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                              $maxZoom = 20, $minZoom = 2, $markerMapClasses = 'marker-map-class', $iconHeight = 42,
                              $iconWidth = 28, $mapEvent = null, $iconMarginLeft = 11, $iconMarginTop = 47,
                              $inputLocation = null, $withTitle = false, $alignTitle = 'text-left',
                              $fontSizeTitle = '14', $colorTitle = null, $colorTitleByClass = 'text-primary'
  )
  {
    $this->lat = $lat;
    $this->lng = $lng;
    $this->locationName = $locationName;
    $this->title = $title;
    $this->zoom = $zoom;
    $this->classes = $classes;
    $this->id = $id;
    $this->mapId = 'map_canvas_' . setting('isite::mapInShow') . '_' . $id;
    $this->settingMap = setting('isite::mapInShow');
    $this->inModal = $inModal;
    $this->mapWidth = $mapWidth;
    $this->mapHeight = $mapHeight;
    $this->layout = $layout;
    $this->view = "isite::frontend.components.maps";
    $this->mapStyle = $mapStyle;
    $this->inputLocation = $inputLocation;
    if (!is_null($inputLocation)){
      $this->lat = $this->inputLocation['lat'];
      $this->lng = $this->inputLocation['lng'];
    }
    $this->withTitle = $withTitle;
    $this->alignTitle = $alignTitle;
    $this->fontSizeTitle = $fontSizeTitle;
    $this->colorTitle = $colorTitle;
    $this->colorTitleByClass = $colorTitleByClass;
    $locationsMap = [];
    array_push($locationsMap, ['lat' => $this->lat, 'lng' => $this->lng, 'title' => $locationName, 'id' => $id]);
    foreach ($locations as $key => $location) {
      array_push($locationsMap, [
        'lat' => $location["lat"],
        'lng' => $location["lng"],
        'title' => $location["title"],
        'id' => $location["id"]
      ]);
    }
    $this->locations = $locationsMap;

    $numLocations = count($this->locations);
    $totalLat = 0;
    $totalLng = 0;

    foreach ($this->locations as $location) {
      $totalLat = $totalLat + $location['lat'];
      $totalLng = $totalLng + $location['lng'];
    }
    $this->centerLat = ($totalLat / $numLocations);
    $this->centerLng = ($totalLng / $numLocations);
    $this->imageIcon = $imageIcon;
    $this->maxZoom = $maxZoom;
    $this->minZoom = $minZoom;
    $this->markerMapClasses = $markerMapClasses;
    $this->iconHeight = $iconHeight;
    $this->iconWidth = $iconWidth;
    $this->iconMarginLeft = $iconMarginLeft;
    $this->iconMarginTop = $iconMarginTop;
    $this->mapEvent = $mapEvent;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public
  function render()
  {
    return view($this->view);
  }
}
