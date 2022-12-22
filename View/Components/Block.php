<?php

namespace Modules\Isite\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Collective\Html\Componentable;
use Illuminate\Support\Facades\Blade;
use Modules\Ibuilder\Entities\Block as BlockEntity;
use Modules\Ifillable\Transformers\FieldTransformer;

class Block extends Component
{
  public $container, $id, $columns, $background, $borderForm, $display,
    $widthContainer, $heightContainer, $backgrounds, $paddingX, $paddingY, $editLink, $tooltipEditLink,
    $marginX, $marginY, $overlay, $backgroundColor, $componentIsite, $componentType, $isBlade, $view,
    $systemName, $blockConfig, $componentConfig, $blockClasses, $blockStyle, $row;

  public function __construct(
    $container = null,
    $id = null,
    $columns = null,
    $borderForm = null,
    $display = null,
    $widthContainer = "100%",
    $heightContainer = "auto",
    $backgrounds = [],
    $paddingX = "",
    $paddingY = "",
    $marginX = "auto",
    $marginY = "auto",
    $overlay = null,
    $backgroundColor = "",
    $componentIsite = "",
    $systemName = null,
    $blockConfig = [],
    $blockClasses = "",
    $blockStyle = "",
    $row = ""
  )
  {
    //Get all params
    $params = get_defined_vars();
    //Init
    $this->instanceGeneralAttributes($params);
    $this->instanceBackgroundAttribute($params);
    $this->instanceBlockConfig($params);
    $this->instanceComponentType($params);
    $this->instanceComponentConfig();
    //list($this->editLink, $this->tooltipEditLink) = getEditLink('Modules\Ibuilder\Repositories\BlockRepository');
    //dd($this->componentType, $this->componentConfig);
  }

  /**
   * Instance the component attributes
   * @return void
   */
  public function instanceGeneralAttributes($params)
  {
    $this->id = $params["id"] ?? uniqid();
    $this->container = $params["container"];
    $this->columns = $params["columns"];
    $this->backgrounds = $params["backgrounds"];
    $this->borderForm = $params["borderForm"];
    $this->display = $params["display"];
    $this->widthContainer = $params["widthContainer"];
    $this->heightContainer = $params["heightContainer"];
    $this->paddingX = $params["paddingX"];
    $this->paddingY = $params["paddingY"];
    $this->marginX = $params["marginX"];
    $this->marginY = $params["marginY"];
    $this->overlay = $params["overlay"];
    $this->backgroundColor = $params["backgroundColor"];
    $this->componentIsite = $params["componentIsite"];
    $this->componentType = null;
    $this->isBlade = false;
    $this->view = "isite::frontend.components.blocks";
    $this->blockConfig = $params["blockConfig"];
    $this->systemName = $params["systemName"];
    $this->blockClasses = $params["blockClasses"];
    $this->blockStyle = $params["blockStyle"];
    $this->row = $params["row"];

  }

  /**
   * Instance the Background attribute
   * @return void
   */
  public function instanceBackgroundAttribute($params)
  {
    $background = [];
    foreach ($params["backgrounds"] as $feature) {
      //validate if the position or the size is _blank
      if (!isset($feature['position']) || empty($feature['position'])) $feature['position'] = '0% 0%';
      if (!isset($feature['size']) || empty($feature['size'])) $feature['size'] = '0% 0%';
      if (!isset($feature['repeat']) || empty($feature['repeat'])) $feature['repeat'] = 'no-repeat';
      if (!isset($feature['background']) || empty($feature['background'])) $feature['background'] = '';
      if (!isset($feature['color']) || empty($feature['color'])) $feature['color'] = '';
      if (!isset($feature['backgroundAttachment']) || empty($feature['backgroundAttachment'])) $feature['backgroundAttachment'] = 'local';

      //add to background the features of backgrounds
      array_push($background, $feature['position'] . "/" . " " .
        $feature['size'] . " " .
        $feature['repeat'] . " " .
        $feature['color'] . " " . 'url("' . $feature['background'] . '")' . " " . $feature['backgroundAttachment']);
    }
    $this->background = implode(",", $background);
  }

  /**
   * Instance the block config
   * @param $params
   * @return void
   */
  public function instanceBlockConfig($params)
  {
    //If not get blockConfig then search by systemName
    if (!is_array($this->blockConfig) || !count($this->blockConfig)) {
      if ($this->systemName) {
        $block = BlockEntity::where("system_name", $this->systemName)->with('fields')->first();
        if ($block) {
          //Parse block Attributes
          $blockAttributes = $block->attributes->toArray();
          //Get and add block Fields in attributes
          $blockFields = $block->formatFillableToModel(fieldTransformer::collection($block->fields));
          $blockAttributes["componentAttributes"] = array_merge(($blockAttributes["componentAttributes"] ?? []), $blockFields);
          //nstance the blockConfig
          $this->blockConfig = [
            "component" => $block->component,
            "entity" => $block->entity,
            "attributes" => $blockAttributes
          ];
        }
      }
    }
    //Parse
    $this->blockConfig = json_decode(json_encode($this->blockConfig));
  }

  /**
   * Validate and instance if the dynamic component is Liveware or Blade
   * @return void
   */
  public function instanceComponentType($params)
  {
    $systemName = $this->blockConfig->component->systemName ?? null;
    $nameSpace = $this->blockConfig->component->nameSpace ?? null;

    //Validate the parameters
    if ($systemName) {
      //Validate if the component is Blade
      if ($nameSpace && class_exists($nameSpace)) $this->componentType = "blade";
      //Validate if the component is liveware
      if (!$this->componentType) {
        try {
          $finder = app('Livewire\LivewireManager');
          $lwClass = $finder->getClass($systemName);
          $this->blockConfig->component->nameSpace = $lwClass;
          $this->componentType = "livewire";
        } catch (\Exception $e) {
        }
      }
    }
    //Error view
    if (!$this->componentType) $this->view = "isite::frontend.components.blocks-error";
  }

  /**
   * Instance the component config
   * @return void
   */
  public function instanceComponentConfig()
  {
    if ($this->componentType) {
      //Instance the default config
      $this->componentConfig = [
        "systemName" => $this->blockConfig->component->systemName ?? null,
        "nameSpace" => $this->blockConfig->component->nameSpace ?? null,
        "attributes" => []
      ];
      //Instance the default Attributes by component
      $attributes = $this->blockConfig->attributes ?? [];
      //Set component attirbutes
      $this->componentConfig["attributes"] = json_decode(json_encode($attributes->componentAttributes ?? []), true);
      //Set child Attributes
      foreach ($attributes as $name => $attr) {
        if (!in_array($name, ["componentAttributes", "blockAttributes"])) {
          $this->componentConfig["attributes"][$name] = json_decode(json_encode($attr), true);
        }
      }
      //Set the entity attributes by component
      $entity = $this->blockConfig->entity ?? null;
      if ($entity) {
        switch ($this->blockConfig->component->systemName) {
          case 'isite::carousel.owl-carousel':
            $this->componentConfig["attributes"]["repository"] = $entity->type;
            $this->componentConfig["attributes"]["params"] = json_decode(json_encode($entity->params), true);
            //Replace the itemComponentAttributes for IcommerceItem
            if ($entity->type == "Modules\Icommerce\Repositories\ProductRepository") {
              if (isset($this->componentConfig["attributes"]["productItemComponentAttributes"])) {
                $this->componentConfig["attributes"]["itemComponentAttributes"] = $this->componentConfig["attributes"]["productItemComponentAttributes"];
                unset($this->componentConfig["attributes"]["productItemComponentAttributes"]);
              }
            }
            break;
          case 'slider::slider.Owl':
            $this->componentConfig["attributes"]["id"] = $entity->id;
            break;
          case 'isite::items-list':
            $entityTypeExploded = explode("\\", str_replace("/", "\\", $entity->type));
            $this->componentConfig["attributes"]["moduleName"] = $entityTypeExploded[1];
            $this->componentConfig["attributes"]["entityName"] = $entityTypeExploded[3];
            break;
          case 'isite::lists':
            $this->componentConfig["attributes"]["repository"] = $entity->type;
            $this->componentConfig["attributes"]["params"] = json_decode(json_encode($entity->params), true);
            // Replace the itemComponentAttributes for IcommerceItem
            if ($entity->type == "Modules\Icommerce\Repositories\ProductRepository") {
              if (isset($this->componentConfig["attributes"]["productItemComponentAttributes"])) {
                  $this->componentConfig["attributes"]["itemComponentAttributes"] = $this->componentConfig["attributes"]["productItemComponentAttributes"];
                  unset($this->componentConfig["attributes"]["productItemComponentAttributes"]);
              }
            }
            break;
        }
      }
    }
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

