<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;
class PageContent extends Component
{
    public $id;
    public $viewParams;
    public $page;

    public $row;
    public $withTitle;
    public $titleClass;
    public $titleStyle;
    public $titleFontSize;
    public $titleLetterSpacing;
    public $titleAlign;
    public $titleColor;
    public $titleColorByClass;

    public $imageClass;
    public $imageStyle;
    public $imageObjectFit;
    public $imageObjectPosicion;
    public $imageAspectRatio;

    public $withMedia;
    public $withBody;
    public $withGallery;
    public $withBodyExtra;
    public $withVideoExternal;
    public $withShare;
    public $orderClasses;

    public $withLineTitle;
    public $lineTitleConfig;

    public $videoLoop;
    public $videoAutoplay;
    public $videoMuted;
    public $videoControls;

    public $bodyClass;
    public $bodyStyle;
    public $bodyFontSize;
    public $bodyAlign;
    public $bodyColor;
    public $bodyColorByClass;
    public $bodyContentInside;

    public $galleryLayout;
    public $galleryResponsive;
    public $galleryDots;
    public $galleryDotsStyle;
    public $galleryDotsStyleColor;
    public $galleryDotsSize;
    public $galleryNav;
    public $galleryNavIcons;
    public $galleryNavSize;
    public $galleryNavColor;
    public $galleryNavColorHover;
    public $galleryNavPosition;
    public $galleryClass;
    public $galleryStyle;
    public $galleryObjectFit;
    public $galleryObjectPosicion;
    public $galleryAspectRatio;

    public $bodyExtra;
    public $bodyExtraClass;
    public $bodyExtraStyle;
    public $bodyExtraFontSize;
    public $bodyExtraAlign;
    public $bodyExtraColor;
    public $bodyExtraColorByClass;
    public $bodyExtraMiniClass;

    public $videoExternal;
    public $videoExternalResponsive;
    public $videoExternalClass;
    public $videoExternalStyle;
    public $videoExternalMiniClass;

    public $shareClass;
    public $shareFontClass;
    public $shareStyle;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($id = null,
                              $viewParams = [],
                              $page = null,
                              $row = "row align-items-center",
                              $withTitle = true,
                              $titleClass = "",
                              $titleStyle = null,
                              $titleFontSize = "24",
                              $titleLetterSpacing = 0,
                              $titleAlign = "",
                              $titleColor = null,
                              $titleColorByClass = "text-white",
                              $imageClass = "",
                              $imageStyle = null,
                              $imageObjectFit = "cover",
                              $imageObjectPosicion = "",
                              $imageAspectRatio = "21/5",
                              $withMedia = true,
                              $withBody = true,
                              $withGallery = true,
                              $withBodyExtra = true,
                              $withVideoExternal = true,
                              $withShare = true,
                              $orderClasses = [],
                              $videoLoop = false,
                              $videoAutoplay = false,
                              $videoMuted = false,
                              $videoControls = false,
                              $withLineTitle = false,
                              $lineTitleConfig = [],
                              $bodyClass = "",
                              $bodyStyle = null,
                              $bodyFontSize = "18",
                              $bodyAlign = "text-justify",
                              $bodyColor = null,
                              $bodyColorByClass = "text-dark",
                              $bodyContentInside = "float-left w-50",
                              $bodyExtraMiniClass = "",
                              $galleryLayout = "gallery-layout-1",
                              $galleryResponsive = [],
                              $galleryDots = false,
                              $galleryDotsStyle = "dots-circular",
                              $galleryDotsStyleColor = "",
                              $galleryDotsSize = "",
                              $galleryNav = false,
                              $galleryNavIcons = "",
                              $galleryNavSize = "14",
                              $galleryNavColor = "var(--dark)",
                              $galleryNavColorHover = "var(--primary)",
                              $galleryNavPosition = "1",
                              $galleryClass = "",
                              $galleryStyle = null,
                              $galleryObjectFit = "cover",
                              $galleryObjectPosicion = "",
                              $galleryAspectRatio = "1/1",
                              $bodyExtra = "",
                              $bodyExtraClass = "",
                              $bodyExtraStyle = null,
                              $bodyExtraFontSize = "18",
                              $bodyExtraAlign = "text-justify",
                              $bodyExtraColor = null,
                              $bodyExtraColorByClass = "text-dark",
                              $shareClass = "",
                              $shareFontClass = "mr-2 mb-2",
                              $shareStyle = null,
                              $videoExternal = null,
                              $videoExternalResponsive = "embed-responsive-4by3",
                              $videoExternalClass = "",
                              $videoExternalStyle = null,
                              $videoExternalMiniClass = ""
  )
  {
      $this->id= $id ?? uniqid('page');
      $this->page = $viewParams['page'] ?? $page;
      $this->row = $row;
      $this->withTitle = $withTitle;
      $this->titleClass = $titleClass;
      $this->titleStyle = $titleStyle;
      $this->titleFontSize = $titleFontSize;
      $this->titleLetterSpacing = $titleLetterSpacing;
      $this->titleAlign = $titleAlign;
      $this->titleColor = $titleColor;
      $this->titleColorByClass = $titleColorByClass;
      $this->imageClass = $imageClass;
      $this->imageStyle = $imageStyle;
      $this->imageObjectFit = $imageObjectFit;
      $this->imageObjectPosicion = $imageObjectPosicion;
      $this->imageAspectRatio = $imageAspectRatio;
      $this->withMedia = $withMedia;
      $this->withBody = $withBody;
      $this->withGallery = $withGallery;
      $this->withBodyExtra = $withBodyExtra;
      $this->withVideoExternal = $withVideoExternal;
      $this->withShare = $withShare;
      $this->orderClasses = !empty($orderClasses) ? $orderClasses : ["title" => "col-12 order-0", "media" => "col-12 order-1", "body" => "col-12 order-2", "gallery" => "col-12 order-3", "bodyExtra" => "col-12 order-4", "videoExternal" => "col-12 order-5", "share" => "col-12 order-6"];
      $this->withLineTitle = $withLineTitle;
      $this->lineTitleConfig = !empty($lineTitleConfig) ? $lineTitleConfig : [
          "background" => "var(--primary)",
          "height" => "2px",
          "width" => "10%",
          "margin" => "0 auto"];
      $this->videoLoop = $videoLoop;
      $this->videoAutoplay = $videoAutoplay;
      $this->videoMuted = $videoMuted;
      $this->videoControls = $videoControls;
      $this->bodyExtraClass = $bodyExtraClass;
      $this->bodyExtraStyle = $bodyExtraStyle;
      $this->bodyExtraFontSize = $bodyExtraFontSize;
      $this->bodyExtraAlign = $bodyExtraAlign;
      $this->bodyExtraColor = $bodyExtraColor;
      $this->bodyExtraColorByClass = $bodyExtraColorByClass;
      $this->bodyExtraMiniClass = $bodyExtraMiniClass;
      $this->galleryLayout = $galleryLayout;
      $this->galleryClass = $galleryClass;
      $this->galleryStyle = $galleryStyle;
      $this->galleryObjectFit = $galleryObjectFit;
      $this->galleryObjectPosicion = $galleryObjectPosicion;
      $this->galleryAspectRatio = $galleryAspectRatio;
      $this->galleryResponsive = $galleryResponsive ?? [0 => ["items" => 1], 640 => ["items" => 2], 992 => ["items" => 4]];
      $this->galleryDots = $galleryDots;
      $this->galleryDotsStyle = $galleryDotsStyle;
      $this->galleryDotsStyleColor = $galleryDotsStyleColor;
      $this->galleryDotsSize = $galleryDotsSize;
      $this->galleryNav = $galleryNav;
      $this->galleryNavSize = $galleryNavSize;
      $this->galleryNavColor = $galleryNavColor;
      $this->galleryNavColorHover = $galleryNavColorHover;
      $this->galleryNavPosition = $galleryNavPosition;
      $this->bodyClass = $bodyClass;
      $this->bodyStyle = $bodyStyle;
      $this->bodyFontSize = $bodyFontSize;
      $this->bodyAlign = $bodyAlign;
      $this->bodyColor = $bodyColor;
      $this->bodyColorByClass = $bodyColorByClass;
      $this->bodyContentInside = $bodyContentInside;
      $this->shareClass = $shareClass;
      $this->shareFontClass = $shareFontClass;
      $this->shareStyle = $shareStyle;
      $this->videoExternalMiniClass = $videoExternalMiniClass;
      $this->videoExternalResponsive = $videoExternalResponsive;
      $this->videoExternalClass = $videoExternalClass;
      $this->videoExternalStyle = $videoExternalStyle;
      //$this-> = $;

      if(!empty($bodyExtra)){
          if (strpos($bodyExtra, ',') !== false) {
              $this->bodyExtra = explode(",",$bodyExtra);
          } else {
              $this->bodyExtra = array($bodyExtra);
          }
      }
      if(!empty($videoExternal)){
          if (strpos($videoExternal, ',') !== false) {
              $this->videoExternal = explode(",",$videoExternal);
          } else {
              $this->videoExternal = array($videoExternal);
          }
      }

      if(!empty($galleryNavIcons)){
          if (strpos($galleryNavIcons, ',') !== false) {
              $this->galleryNavIcons = explode(",",$galleryNavIcons);
          } else {
              $this->galleryNavIcons = $this->galleryLayout=="gallery-layout-7" ? array("fa fa-angle-up","fa fa-angle-down") : array("fa fa-arrow-left","fa fa-arrow-right");
          }
      } else {
          $this->galleryNavIcons = $this->galleryLayout=="gallery-layout-7" ? array("fa fa-angle-up","fa fa-angle-down") : array("fa fa-arrow-left","fa fa-arrow-right");

      }

  }


  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view("isite::frontend.components.page-content");
  }
}
