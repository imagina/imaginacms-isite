<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;
use Modules\Media\Entities\File;
use Modules\Setting\Entities\Setting;
class BreadcrumbNew extends Component
{

    public $viewParams;
    public $page;
    public $breadcrumbSection;
    public $breadcrumbClass;
    public $breadcrumbStyle;
    public $breadcrumbFontSize;
    public $breadcrumbColor;
    public $container;
    public $containerClass;
    public $row;
    public $col;
    public $withTitle;
    public $titleClass;
    public $titleStyle;
    public $titlePosition;
    public $fontSizeTitle;
    public $colorTitle;
    public $colorTitleByClass;
    public $withImage;
    public $imageClass;
    public $imageStyle;
    public $imageObjectFit;
    public $imageObjectPosicion;
    public $imageAspectRatio;
    public $imageAspectRatioMobile;
    public $overlay;
    public $icon;
    public $iconFont;
    public $breadcrumbPosition; // arriba abajo dentro

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($viewParams = [],
                              $page = null,
                              $breadcrumbSection = "",
                              $breadcrumbClass = "bg-transparent px-0 mb-0",
                              $breadcrumbStyle = "",
                              $breadcrumbFontSize = null,
                              $breadcrumbColor = null,
                              $container = "container",
                              $containerClass = "",
                              $row = "row align-items-center",
                              $col = "col-auto",
                              $withTitle = false,
                              $titleClass = "",
                              $titleStyle = "",
                              $titlePosition = 1,
                              $fontSizeTitle = "24",
                              $colorTitle = null,
                              $colorTitleByClass = "text-white",
                              $withImage = false,
                              $imageClass = "",
                              $imageStyle = "",
                              $overlay = "",
                              $icon = "",
                              $iconFont = "",
                              $breadcrumbPosition = 0,
                              $imageObjectFit = "cover",
                              $imageObjectPosicion = "",
                              $imageAspectRatio = "21/5",
                              $imageAspectRatioMobile = "16/9"
  )
  {
      $this->page = $viewParams['page'] ?? $page;
      $this->breadcrumbSection = $breadcrumbSection;
      $this->breadcrumbClass = $breadcrumbClass;
      $this->breadcrumbStyle = $breadcrumbStyle;
      $this->breadcrumbFontSize = $breadcrumbFontSize;
      $this->breadcrumbColor = $breadcrumbColor;
      $this->container = $container;
      $this->containerClass = $containerClass;
      $this->row = $row;
      $this->col = $col;
      $this->withTitle = $withTitle;
      $this->titleClass = $titleClass;
      $this->titleStyle = $titleStyle;
      $this->titlePosition = $titlePosition;
      $this->fontSizeTitle = $fontSizeTitle;
      $this->colorTitle = $colorTitle;
      $this->colorTitleByClass = $colorTitleByClass;
      $this->withImage = $withImage;
      $this->imageClass = $imageClass;
      $this->imageStyle = $imageStyle;
      $this->overlay = $overlay;
      $this->icon = $icon;
      $this->iconFont = $iconFont;
      $this->breadcrumbPosition = $breadcrumbPosition;
      $this->imageObjectFit = $imageObjectFit;
      $this->imageObjectPosicion = $imageObjectPosicion;
      $this->imageAspectRatio = $imageAspectRatio;
      $this->imageAspectRatioMobile = $imageAspectRatioMobile;
  }

  
  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view("isite::frontend.components.breadcrumb-new");
  }
}
