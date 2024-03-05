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
  public $colorTitleSection;
  public $fontSizeTitleSection;
  public $iframeMap;
  public $usingLivewire;
  public $allowMoveMarker;
  public $showLocationName;

  public $initMultipleLocations;
  public $activeClickInMarker;
  public $emitAfterClickMarker;
  public $activeAnimationInMarker;
  public $inputVarName;

  public $labelFontSize;
  public $labelFontWeight;
  public $labelColor;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($lat = null, $lng = null, $locationName = null, $title = 'Mapa',
                              $zoom = 16, $classes = '', $id = 1, $mapId = null, $inModal = false, $mapWidth = '100%',
                              $mapHeight = '314px', $layout = 'map-layout-1', $locations = [], $view = null,
                              $imageIcon = null, $mapStyle = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                              $maxZoom = 20, $minZoom = 2, $markerMapClasses = 'marker-map-class', $iconHeight = 42,
                              $iconWidth = 28, $mapEvent = null, $iconMarginLeft = 11, $iconMarginTop = 47,
                              $inputLocation = null, $withTitle = false, $alignTitle = 'text-left',
                              $fontSizeTitle = '14', $colorTitle = null, $colorTitleByClass = 'text-primary',
                              $colorTitleSection = "#000000", $fontSizeTitleSection = "24", $iframeMap = null, 
                              $usingLivewire = false, $allowMoveMarker = false, $showLocationName = true, $initMultipleLocations = false,
                              $activeClickInMarker = false, $emitAfterClickMarker = false, $activeAnimationInMarker = false, $inputVarName = null, 
                              $labelFontSize = null, $labelFontWeight=null, $labelColor=null
  ){
    $defaultMap = json_decode(setting('isite::locationSite'));
    $this->lat = $lat ?? $defaultMap->lat;
    $this->lng = $lng ?? $defaultMap->lng;
    $this->locationName = $locationName ?? setting('isite::locationName') ?? setting('core::site-name');
    $this->title = $title;
    $this->zoom = $zoom;
    $this->classes = $classes;
    $this->id = $id;
    $this->mapId = !is_null($mapId) ? $mapId : 'map_canvas_' . setting('isite::mapInShow') . '_' . $id;
    $this->settingMap = setting('isite::mapInShow');
    $this->inModal = $inModal;
    $this->mapWidth = $mapWidth;
    $this->mapHeight = $mapHeight;
    $this->layout = $layout;
    $this->view = "isite::frontend.components.maps";
    $this->mapStyle = $mapStyle;
    $this->inputLocation = $inputLocation;
    if (!is_null($inputLocation)) {
      $this->lat = $this->inputLocation['lat'];
      $this->lng = $this->inputLocation['lng'];
    }
    $this->withTitle = $withTitle;
    $this->alignTitle = $alignTitle;
    $this->fontSizeTitle = $fontSizeTitle;
    $this->colorTitle = $colorTitle;
    $this->colorTitleByClass = $colorTitleByClass;
    $locationsMap = [];
    if ($this->lat != (string)4.6469204494764 || $this->lng != (string)-74.078579772573) {
      array_push($locationsMap, ['lat' => $this->lat, 'lng' => $this->lng, 'title' => $this->locationName,
        'id' => $id]);
    }
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
    $this->colorTitleSection = $colorTitleSection;
    $this->fontSizeTitleSection = $fontSizeTitleSection;
    $this->iframeMap = setting('isite::iframeMap');

    //New Variables to Map with Livewire processes
    $this->usingLivewire = $usingLivewire;
    $this->allowMoveMarker = $allowMoveMarker;
    $this->showLocationName = $showLocationName;
    $this->initMultipleLocations = $initMultipleLocations;
    $this->activeClickInMarker = $activeClickInMarker;
    $this->emitAfterClickMarker = $emitAfterClickMarker;
    $this->activeAnimationInMarker = $activeAnimationInMarker;
    $this->inputVarName = $inputVarName; //Used in Address Map Component | Iprofile
    
    // Label Marker
    $fontSizeValue =  $labelFontSize ?? setting("isite::markerLabelFontSize",null,"12");
    $this->labelFontSize = $fontSizeValue."px";
    $this->labelFontWeight = $labelFontWeight ?? setting("isite::markerLabelFontWeight",null,"normal");
    $this->labelColor = $labelColor ?? setting("isite::markerLabelColor",null,"black");
    
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view($this->view);
  }
}
