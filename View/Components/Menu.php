<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;

class Menu extends Component
{

  public $items;
  public $view;
  public $itemLayout;
  public $id;
  public $repository;
  public $layout;
  public $title;
  public $params;
  public $menuBefore;
  public $menuAfter;
  public $withHome;
  public $homeIcon;
  public $collapsed;
  public $central;
  public $modalStyle;
  public $modalTextTransform;
  public $modalColor1;
  public $modalColor2;
  public $modalTextSize;
  public $deskStyle;
  public $deskStyleGeneral;
  public $deskTextTransform;
  public $deskTextSize;
  public $deskColor1;
  public $deskColor2;
  public $deskNav;
  public $deskNavHover;
  public $deskDropdownMenu;
  public $deskNavBefore;
  public $deskNavHoverBefore;
  public $linkMovil;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($id = null, $repository = null, $params = [], $layout = 'category-menu-layout-1',
                              $title = "Categorías", $menuBefore = null, $menuAfter = null, $withHome = true,
                              $homeIcon = "", $collapsed = false, $central = false, $modalStyle = null,
                              $deskStyle = null, $deskTextTransform = "capitalize", $modalTextTransform = "uppercase",
                              $deskTextSize = "18", $modalTextSize = "16", $modalColor1 = "", $modalColor2 = "",
                              $deskColor1 = "", $deskColor2 = "", $deskNav = "", $deskNavHover = "",
                              $deskDropdownMenu = "", $deskNavBefore = "", $deskNavHoverBefore = "",
                              $linkMovil = "", $deskStyleGeneral = null
  )
  {
    $this->id = $id ?? uniqid('menu');
    $this->repository = $repository;
    $this->params = $params;
    $this->layout = $layout;
    $this->title = $this->layout == 'category-menu-layout-2' ? ($title == "Categorías" ? "" : $title) : $title;
    $this->menuBefore = $menuBefore;
    $this->menuAfter = $menuAfter;
    $this->withHome = $withHome;
    $this->collapsed = $collapsed;
    $this->homeIcon = $homeIcon ?? "fa fa-home";
    $this->central = $central;
    $this->view = "isite::frontend.components.category-menu.layouts.{$layout}.index";
    $this->items = [];
    $this->modalStyle = $modalStyle;
    $this->deskStyle = $deskStyle;
    $this->deskTextTransform = $deskTextTransform;
    $this->modalTextTransform = $modalTextTransform;
    $this->deskTextSize = $deskTextSize;
    $this->modalTextSize = $modalTextSize;
    $this->modalColor1 = $modalColor1;
    $this->modalColor2 = $modalColor2;
    $this->deskColor1 = $deskColor1;
    $this->deskColor2 = $deskColor2;
    $this->deskNav = $deskNav;
    $this->deskNavHover = $deskNavHover;
    $this->deskDropdownMenu = $deskDropdownMenu;
    $this->deskNavBefore = $deskNavBefore;
    $this->deskNavHoverBefore = $deskNavHoverBefore;
    $this->linkMovil = $linkMovil;
    $this->deskStyleGeneral = $deskStyleGeneral;
    $this->getItems();
  }

  private function makeParamsFunction()
  {
    return [
      'include' => $this->params['include'] ?? ['children'],
      'take' => $this->params['take'] ?? false,
      'page' => $this->params['page'] ?? false,
      'filter' => $this->params['filter'] ?? ['showMenu' => true],
      'order' => $this->params['order'] ?? null,
    ];
  }

  private function getItems()
  {
    $params = $this->makeParamsFunction();

    if ($this->repository) {
      $items = app($this->repository)->getItemsBy(json_decode(json_encode($params)));

      if ($items->isNotEmpty()) {
        $this->items = $items->toTree();
      }
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
