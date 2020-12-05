<?php

namespace Modules\Isite\View\Components\menu;

use Illuminate\View\Component;

class Menu extends Component
{


  public $items;
  public $view;
  public $itemLayout;
  public $dots;
  public $id;
  public $repository;
  public $layout;
  public $title;
  public $filter;
  public $responsiveClass;
  public $menuBefore;
  public $menuAfter;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($repository, $filter = ["showMenu" => true,"parentId" => 0], $id, $layout = 'category-menu-layout-1', $title = "Categorías", $menuBefore = null, $menuAfter = null)
  {
    $this->id = $id;
    $this->repository = $repository;
    $this->filter = $filter;
    $this->layout = $layout;
    $this->title = $title;
    $this->menuBefore = $menuBefore;
    $this->menuAfter = $menuAfter;

    $this->view = "isite::frontend.components.category-menu.layouts.{$layout}.index";

    $this->getItems();
  }

  private function getItems(){

    $params = [
      "include" => ["children"],
      "filter" => $this->filter,
      "take" => false,
    ];



    $this->items = app($this->repository)->getItemsBy(json_decode(json_encode($params)));

    switch($this->repository){
      case 'Modules\Icommerce\Repositories\ProductRepository':
        $this->itemLayout = setting('icommerce::productListItemLayout');
        break;
      case 'Modules\Iblog\Repositories\PostRepository':
        $this->itemLayout = $this->layout ?? setting('iblog::postListItemLayout');
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
