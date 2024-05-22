<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;

class Copyright extends Component
{
  public $year;
  public $name;
  public $withIconCopyright;
  public $withLabelCopyright;
  public $withYear;
  public $withTitleCopyright;
  public $withSiteName;
  public $classes;
  public $styles;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($classes = "", $withIconCopyright = false, $withLabelCopyright = true,
                              $withYear = true, $withTitleCopyright = true, $withSiteName = true,
                              $styles = null)
  {
    $this->name = @setting('core::site-name');
    $this->year = date('Y');
    $this->withYear = $withYear;
    $this->withIconCopyright = $withIconCopyright;
    $this->withLabelCopyright = $withLabelCopyright;
    $this->withTitleCopyright = $withTitleCopyright;
    $this->withSiteName = $withSiteName;
    $this->classes = $classes;
    $this->styles = $styles;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('isite::frontend.components.copyright');
  }
}
