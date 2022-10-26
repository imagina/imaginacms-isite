<?php

namespace Modules\Isite\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Block extends Component
{
  public $container;
  public $id;
  public $columns;
  public $background;
  public $borderForm;
  public $display;
  public $widthContainer;
  public $heightContainer;
  public $backgrounds;
  public $paddingX;
  public $paddingY;
  public $marginX;
  public $marginY;
  public $overlay;
  public $backgroundColor;
  public $componentIsite;
  public $itemComponentNamespace;
  public $itemComponent;
  public $itemComponentAttributes;
  public $componentLivewire;

  public function __construct(

    $container = "container",
    $id = null,
    $columns = "col-12",
    $borderForm = "",
    $display = "inherit",
    $widthContainer = "100%",
    $heightContainer = "auto",
    $backgrounds = [],
    $paddingX = "",
    $paddingY = "",
    $marginX = "0%",
    $marginY = "0%",
    $overlay = null,
    $backgroundColor = "",
    $componentIsite = "",
    $itemComponentNamespace = null,
    $itemComponent = null,
    $itemComponentAttributes = null,
    $componentLivewire = null
  )

  {
    $this->container = $container;
    $this->columns = $columns;
    $background = [];
    //$position."/".$size."".$repeat.$image.$color

    $this->id = $id ?? uniqid();
    foreach ($backgrounds as $feature) {

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
    $this->backgrounds = $backgrounds;
    $this->borderForm = $borderForm;
    $this->display = $display;
    $this->widthContainer = $widthContainer;
    $this->heightContainer = $heightContainer;
    $this->paddingX = $paddingX;
    $this->paddingY = $paddingY;
    $this->marginX = $marginX;
    $this->marginY = $marginY;
    $this->overlay = $overlay;
    $this->backgroundColor = $backgroundColor;
    $this->componentIsite = $componentIsite;
    $this->itemComponentNamespace = $itemComponentNamespace;
    $this->itemComponent = $itemComponent;
    $this->itemComponentAttributes = $itemComponentAttributes;
    $this->componentLivewire = $componentLivewire;

    if (!is_null($this->componentLivewire)){
      $existComponentLivewire = app('Livewire\LivewireComponentsFinder')->find($this->componentLivewire);
    }
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view("isite::frontend.components.blocks");
  }
}

