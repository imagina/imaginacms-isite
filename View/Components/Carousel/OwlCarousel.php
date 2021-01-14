<?php

namespace Modules\Isite\View\Components\Carousel;

use Illuminate\View\Component;

class OwlCarousel extends Component
{


  public $items;
  public $itemsBySlide;
  public $view;
  public $itemLayout;
  public $loop;
  public $dots;
  public $nav;
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

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($repository, $id, $params = [], $margin = 10, $responsiveClass = true, $autoplay = true,
                              $autoplayHoverPause = true, $loop = true, $dots = true, $nav = true, $responsive = null,
                              $itemLayout = null, $title = "", $subTitle = "", $itemsBySlide = 1, $navText = "")
  {

    $this->loop = $loop;
    $this->id = $id;
    $this->dots = $dots;
    $this->nav = $nav;
    $this->navText = json_encode($navText);
    $this->responsive = json_encode($responsive ?? [0 => ["items" =>  1],640 => ["items" => 2],992 => ["items" => 4]]);
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

    $this->view = "isite::frontend.components.owl.carousel";
    $this->getItems();
 
  }

  private function makeParamsFunction(){

    return [
      "include" => $this->params["include"] ?? [],
      "take" => $this->params["take"] ?? 12,
      "page" => $this->params["page"] ?? 1,
      "filter" => $this->params["filter"] ?? [],
      "order" => $this->params["order"] ?? null
    ];
  }

  private function getItems(){


    $this->items = app($this->repository)->getItemsBy(json_decode(json_encode($this->makeParamsFunction())));

    switch($this->repository){
      case 'Modules\Icommerce\Repositories\ProductRepository':
        !$this->itemLayout ? $this->itemLayout = setting('icommerce::productListItemLayout') : false;
        break;
      case 'Modules\Icommerce\Repositories\CategoryRepository':
        $this->itemLayout = $this->itemLayout ?? setting('icommerce::categoryListItemLayout');
        break;
      case 'Modules\Iblog\Repositories\PostRepository':
        $this->itemLayout = $this->itemLayout ?? setting('iblog::postListItemLayout');
        break;
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
