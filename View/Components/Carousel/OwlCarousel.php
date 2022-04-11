<?php

namespace Modules\Isite\View\Components\Carousel;

use Illuminate\View\Component;

class OwlCarousel extends Component
{


  public $items;
  public $emptyItems;
  public $itemsBySlide;
  public $view;
  public $itemLayout;
  public $loop;
  public $dots;
  public $nav;
  public $center;
  public $navText;
  public $id;
  public $repository;
  public $title;
  public $subTitle;
  public $params;
  public $responsive;
  public $margin;
  public $responsiveClass;
  public $autoplay;
  public $autoplayHoverPause;
  public $containerFluid;
  public $itemComponent;
  public $owlBlockStyle;
  public $editLink;
  public $tooltipEditLink;
  public $stagePadding;
  public $autoplayTimeout;
  public $itemComponentAttributes;
  public $itemComponentNamespace;

  
  
  
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($repository, $id, $view = null, $params = [], $margin = 10, $responsiveClass = true, $autoplay = true,
                              $autoplayHoverPause = true, $loop = true, $dots = true, $nav = true, $center = false, $responsive = null,
                              $itemLayout = null, $title = "", $subTitle = "", $itemsBySlide = 1, $navText = "",
                              $containerFluid = false, $itemComponent = null, $owlBlockStyle = null, $stagePadding = 0,
                              $itemComponentAttributes = [], $itemComponentNamespace = "Modules\Isite\View\Components\ItemList",
                              $autoplayTimeout = 5000)
  {

    $this->emptyItems = false;
    $this->loop = $loop;
    $this->id = $id;
    $this->dots = $dots;
    $this->nav = $nav;
    $this->center = $center;
    $this->navText = json_encode($navText);
    $this->responsive = json_encode($responsive ?? [0 => ["items" => 1], 640 => ["items" => 2], 992 => ["items" => 4]]);
    $this->margin = $margin;
    $this->responsiveClass = $responsiveClass;
    $this->autoplay = $autoplay;
    $this->autoplayHoverPause = $autoplayHoverPause;
    $this->repository = $repository;
    $this->params = $params;
    $this->itemLayout = $itemLayout;
    $this->title = $title;
    $this->itemsBySlide = $itemsBySlide;
    $this->subTitle = $subTitle;
    $this->containerFluid = $containerFluid;
    $this->owlBlockStyle = $owlBlockStyle;
    $this->itemComponent = $itemComponent ?? "isite::item-list";
    $this->view = $view ?? "isite::frontend.components.owl.carousel";
    $this->getItems();
    $this->stagePadding = $stagePadding;
    $this->autoplayTimeout = $autoplayTimeout;
    $this->itemComponentAttributes = $itemComponentAttributes;
    $this->itemComponentNamespace = $itemComponentNamespace;

    list($this->editLink, $this->tooltipEditLink) = getEditLink($this->repository);
  }

  private function makeParamsFunction()
  {

    return [
      "include" => $this->params["include"] ?? [],
      "take" => $this->params["take"] ?? 12,
      "page" => $this->params["page"] ?? 1,
      "filter" => $this->params["filter"] ?? [],
      "order" => $this->params["order"] ?? null
    ];
  }

  private function getItems()
  {

    $this->items = app($this->repository)->getItemsBy(json_decode(json_encode($this->makeParamsFunction())));

    switch ($this->repository) {
      case 'Modules\Icommerce\Repositories\ProductRepository':
        !$this->itemLayout ? $this->itemLayout = setting('icommerce::productListItemLayout') : false;
        if (is_module_enabled("Icommerce") && $this->itemComponent == "isite::item-list") {
          $this->itemComponent = "icommerce::product-list-item";
          $this->itemComponentNamespace = "Modules\Icommerce\View\Components\ProductListItem";
        }
        break;
    }

    if ($this->items->isEmpty()) {
      $this->emptyItems = true;
    }
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|string
   */
  public function render()
  {
    return view($this->view);
  }
}
