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
  public $border;
  public $paddingY;
  public $paddingX;
  public $marginY;
  public $marginX;
  public $alainSocialNetwork;
  public $layoutSocialNetwork;

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
                              $withIconAddress = true, $withIconEmail = true, $border = '', $paddingY = '',
                              $paddingX = '', $marginY = '', $marginX = '', $alainSocialNetwork = 'justify-content-left',
                              $layoutSocialNetwork = 'social-layout-1'
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
    $this->border = $border;
    $this->paddingY = $paddingY;
    $this->paddingX = $paddingX;
    $this->marginY = $marginY;
    $this->marginX = $marginX;
    $this->alainSocialNetwork = $alainSocialNetwork;
    $this->layoutSocialNetwork = $layoutSocialNetwork;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public
  function render()
  {
    return view('isite::frontend.components.info-contact');
  }
}