<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;

class InfoContact extends Component
{
  public $withPhone;
  public $withAddress;
  public $withEmail;
  public $withSocialNetworks;
  public $title;
  public $titlePhone;
  public $titleAddress;
  public $titleEmail;
  public $subtitle;
  public $withTitle;
  public $withSubtitle;
  public $withTitlePhone;
  public $withTitleAddress;
  public $withTitleEmail;
  public $layout;
  public $view;
  public $iconAddress;
  public $iconPhone;
  public $iconEmail;
  public $withIconComponentAddress;
  public $withIconComponentPhone;
  public $withIconComponentEmail;
  public $AlainTitle;
  public $AlainSubtitle;
  public $AlainIcons;
  public $AlainTitleInfoContact;
  public $AlainInfoContact;
  public $container;
  public $withIconPhone;
  public $withIconAddress;
  public $withIconEmail;
  public $contentBorderType;
  public $contentPaddingY;
  public $contentPaddingX;
  public $contentMarginY;
  public $contentMarginX;
  public $alainSocialNetwork;
  public $layoutSocialNetwork;
  public $colorTitleSection;
  public $fontSizeTitleSection;
  public $colorSubtitleSection;
  public $fontSizeSubtitleSection;
  public $colorTitleContact;
  public $fontSizeTitleContact;
  public $colorIcons;
  public $fontSizeIcons;
  public $orderInfo;
  public $contentBorder;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($withPhone = true, $withAddress = true, $withEmail = true, $withSocialNetworks = true,
                              $title = 'Datos de contacto', $titlePhone = 'Télefono', $titleAddress = 'Dirección',
                              $titleEmail = 'Email', $subtitle = null, $withTitle = true, $withSubtitle = false,
                              $withTitlePhone = true, $withTitleAddress = true, $withTitleEmail = true,
                              $iconAddress = 'fa fa-map-marker', $iconPhone = 'fa fa-phone', $iconEmail = 'fa fa-envelope',
                              $withIconComponentAddress = true, $withIconComponentPhone = true,
                              $withIconComponentEmail = true, $AlainTitle = 'text-left', $AlainSubtitle = 'text-left',
                              $AlainIcons = 'justify-content-left', $AlainInfoContact = 'justify-content-left',
                              $AlainTitleInfoContact = 'text-left', $container = 'container', $withIconPhone = true,
                              $withIconAddress = true, $withIconEmail = true, $contentBorderType = '',
                              $contentPaddingY = '', $contentPaddingX = '', $contentMarginY = '', $contentMarginX = '',
                              $alainSocialNetwork = 'justify-content-left', $layoutSocialNetwork = 'social-layout-1',
                              $colorTitleSection = '000000FF', $fontSizeTitleSection = '16',
                              $colorTitleContact = '000000FF', $fontSizeTitleContact = '16', $colorIcons = '000000FF',
                              $fontSizeIcons = '16', $orderInfo = [], $contentBorder = '1',
                              $layout = 'info-contact-layout-1', $colorSubtitleSection = '000000FF',
                              $fontSizeSubtitleSection = '16'
  )
  {
    $this->withPhone = $withPhone;
    $this->withAddress = $withAddress;
    $this->withEmail = $withEmail;
    $this->withSocialNetworks = $withSocialNetworks;
    $this->title = $title;
    $this->titlePhone = $titlePhone;
    $this->titleAddress = $titleAddress;
    $this->titleEmail = $titleEmail;
    $this->subtitle = $subtitle;
    $this->withTitle = $withTitle;
    $this->withSubtitle = $withSubtitle;
    $this->withTitlePhone = $withTitlePhone;
    $this->withTitleAddress = $withTitleAddress;
    $this->withTitleEmail = $withTitleEmail;
    $this->iconAddress = $iconAddress;
    $this->iconPhone = $iconPhone;
    $this->iconEmail = $iconEmail;
    $this->withIconPhone = $withIconPhone;
    $this->withIconAddress = $withIconAddress;
    $this->withIconEmail = $withIconEmail;
    $this->withIconComponentAddress = $withIconComponentAddress;
    $this->withIconComponentPhone = $withIconComponentPhone;
    $this->withIconComponentEmail = $withIconComponentEmail;
    $this->AlainTitle = $AlainTitle;
    $this->AlainSubtitle = $AlainSubtitle;
    $this->AlainTitleInfoContact = $AlainTitleInfoContact;
    $this->AlainIcons = $AlainIcons;
    $this->AlainInfoContact = $AlainInfoContact;
    $this->container = $container;
    $this->contentBorderType = $contentBorderType;
    $this->contentPaddingY = $contentPaddingY;
    $this->contentPaddingX = $contentPaddingX;
    $this->contentMarginY = $contentMarginY;
    $this->contentMarginX = $contentMarginX;
    $this->alainSocialNetwork = $alainSocialNetwork;
    $this->layoutSocialNetwork = $layoutSocialNetwork;
    $this->colorTitleSection = $colorTitleSection;
    $this->fontSizeTitleSection = $fontSizeTitleSection;
    $this->colorTitleContact = $colorTitleContact;
    $this->fontSizeTitleContact = $fontSizeTitleContact;
    $this->colorIcons = $colorIcons;
    $this->fontSizeIcons = $fontSizeIcons;
    $this->orderInfo = !empty($orderInfo) ? $orderInfo : ["phone" => "order-0", "address" => "order-1", "email" => "order-2", "socialNetworks" => "order-3"];
    $this->colorSubtitleSection = $colorSubtitleSection;
    $this->fontSizeSubtitleSection = $fontSizeSubtitleSection;
    $this->contentBorder = $contentBorder;
    $this->layout = $layout;
    $this->view = "isite::frontend.components.info-contact.layouts.".$this->layout.".index";
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public
  function render()
  {
    return view($this->view);
  }
}