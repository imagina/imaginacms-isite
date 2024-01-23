<?php

namespace Modules\Isite\Http\Livewire\Index;

use Livewire\Component;

class ItemsMap extends Component
{

  public $view;
  public $params;
  public $repository;
  public $repoMethod;
  public $log;
  public $layoutMarkPopup;
  public $locations;
  public $distancePoints;
  public $urlMarkerIcon;
 
  /**
  * Listeners
  */
  protected $listeners = [
    'itemListRendered' => 'getData', //First Request
    'itemListRenderedAlways' => 'getData'//With Pagination
  ];
 
  /*
  * Runs once, immediately after the component is instantiated,
  * but before render() is called
  */
  public function mount($view = "isite::frontend.livewire.index.items-map", $params = null, $repository = "Modules\Iad\Repositories\AdRepository", $repoMethod = 'getItemsBy',
  $layoutMarkPopup = "mark-popup-layout-1", $urlMarkerIcon = null
  ){
    $this->log = "Isite::Livewire|Index|ItemsMaps|";
    $this->locations = [];

    $this->view = $view;
    $this->params = $params;
    $this->repository = $repository;
    $this->repoMethod = $repoMethod;

    //Layout personalizado para el Mark Popup
    $this->layoutMarkPopup = "isite::frontend.components.map.layouts.mark-popup.".$layoutMarkPopup.".index";

    //Valor en Mts
    $this->distancePoints = setting('isite::mapGroupMarkersDistance',null,1);

    //Esto no funcionó | traia url default y no la guardada en el setting
    //dd(setting('isite::mapIconMarker'));

    $this->urlIcon = $urlMarkerIcon;


  }

  /*
  * Listener - itemModalLoadData
  * @param $params (Params to repository used by ItemList)
  */
  public function getData($params)
  {

    //\Log::info($this->log."Item List Params:".json_encode($params));
   
    // Search items
    $items = $this->getRepository()->{$this->repoMethod}(json_decode(json_encode($params)));

    /*
    //Codigo Base 1
    $locationsMap = [];
    //Get location params from Items
    foreach ($items as $key => $item) {

      //Base layout to Mark Popup
      $renderedView = view($this->layoutMarkPopup,['items'=>$item])->render();

      //Fix to frontend
      //$this->htmlMarkPopup = str_replace(array("\r", "\n"), '', $renderedView);
      
      array_push($locationsMap, [
        'lat' => $item["lat"],
        'lng' => $item["lng"],
        'title' => $item["title"],
        'id' => $item["id"],
        'renderedView' => $renderedView
      ]);
    }
    */

    //Codigo Base 2
    $locationsMap = $this->groupLocations($items);

    //dd($locationsMap);

    //Set locations
    $this->locations = $locationsMap;
    //\Log::info($this->log."Locations:".json_encode($this->locations));

    //Send event to Update Locations in frontend
    $this->dispatchBrowserEvent('items-map-updated',[
      'locationsItem' => $this->locations
    ]);

  }

  /*
  * Get Item Repository
  *
  */
  private function getRepository()
  {
    return app($this->repository);
  }
  
  /*
  * Render
  *
  */
  public function render()
  {

    return view($this->view);

  }

  /*
  * Verificar y Agrupar locations
  */
  public function groupLocations($items)
  {
    \Log::info($this->log."GroupLocations|START");
    $groupLocations = [];

    $cant = count($items);

    if($cant>0){

      //Main For | Check All Items
      for ($i=0; $i < $cant ; $i++) { 
        $itemCheck = $items[$i];
        \Log::info($this->log."**** CHECK|ItemId: ".$itemCheck["id"]);

        //Attributes para el siguiente for
        $itemCheckWasGrouped = false;
        $groupItems = [];
        $groupItemsId = [];

        //Second For | Check main item with others items
        for ($j=$i+1; $j<$cant; $j++) { 
         
          $itemNext = $items[$j];
          \Log::info($this->log."NEXT|ItemId: ".$itemNext["id"]);

          //Calcular distancia entre puntos
          $distance = $this->calcultaDistance($itemCheck,$itemNext);

          //Son items cercanos entonces se agrupan
          if($distance<$this->distancePoints){

            \Log::info($this->log."Agrupando Items");

            //Agrego el item principal al grupo
            if($itemCheckWasGrouped==false){
              array_push($groupItems, $itemCheck);
              array_push($groupItemsId, $itemCheck->id);//Guardar los Ids para aprovechar el FOR
              $itemCheckWasGrouped = true;
            }

            //Agrego el item siguente al grupo
            array_push($groupItems, $itemNext);
            array_push($groupItemsId, $itemNext->id);//Guardar los Ids para aprovechar el FOR
          }

        }

        \Log::info($this->log."Items Agrupados: ".count($groupItems));

        //El itemCheck fue agrupado con otros items
        if(count($groupItems)>0){

          \Log::info($this->log."Guardando Agrupados");

          //Base layout to Mark Popup
          $renderedView = view($this->layoutMarkPopup,['items'=> $groupItems])->render();

          //Se define 1 solo Marker para todos los grupos de Items
          array_push($groupLocations, [
            'lat' => $groupItems[0]["lat"],
            'lng' => $groupItems[0]["lng"],
            'title' => "Ver mas",
            'id' => $groupItems[0]["id"],
            'groupItemsId' => $groupItemsId,
            'renderedView' => $renderedView
          ]);

        }else{

          //Verificar que el item a guardar no fue agrupado anteriormente
          $itemExist = false;
          foreach ($groupLocations as $key => $locations) {
            //El marcador creado es de varios items, y el item a guardar ya fue agregado
            if(isset($locations['groupItemsId']) && in_array($items[$i]["id"], $locations['groupItemsId'])){
              $itemExist = true;
              break;
            }
          }

          //Si no fue agrupado, se crea marcador para ese Item
          if($itemExist==false){

            \Log::info($this->log."Guardando Individual | ItemId:".$items[$i]["id"]);

            //Se envia siempre en un array para renderizar el layout
            $itemsView[0] = $items[$i];

            //Base layout to Mark Popup
            $renderedView = view($this->layoutMarkPopup,['items' =>  $itemsView ])->render();

            //Se agrega data para el Marcador
            array_push($groupLocations, [
              'lat' => $items[$i]["lat"],
              'lng' => $items[$i]["lng"],
              'title' => $items[$i]["title"],
              'id' => $items[$i]["id"],
              'renderedView' => $renderedView
            ]);

          }
          
        }
        
      }

    }

    \Log::info($this->log."GroupLocations|END");

    return $groupLocations;
    
  }

  /*
  * Calcular distancia entre 2 Items
  */
  public function calcultaDistance($itemA,$itemB)
  {

    //Transformacion a Radianes
    $rlat0 = deg2rad($itemA['lat']);
    $rlng0 = deg2rad($itemA['lng']);
    $rlat1 = deg2rad($itemB['lat']);
    $rlng1 = deg2rad($itemB['lng']);

    //Diferencia entre valores
    $lonDelta = $rlng1 - $rlng0;

    //Radio de la Tierra: 6371Km | 6371000 Mts,
    //Usando ley esférica de los cosenos
    $distance = round((6371000 *
        acos(
            cos($rlat0) * cos($rlat1) * cos($lonDelta) +
            sin($rlat0) * sin($rlat1)
        )
    ),2);
    
    \Log::info($this->log."Distance Aprox: ".$distance." Mts");

    return $distance;

  }

}