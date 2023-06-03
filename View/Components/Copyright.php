<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;
use Modules\Media\Entities\File;
use Modules\Setting\Entities\Setting;

class Copyright extends Component
{
  public $year;
  public $name;
  public $layout;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($classes = null, $layout = 'copyright-layout-1')
  {
    $this->name = @setting('core::site-name');
    $this->year = date('Y');
    $this->layout = $layout;
  }
  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public
  function render()
  {
    return view("isite::frontend.components.copyright.layouts.".$this->layout.".index");
  }
}


