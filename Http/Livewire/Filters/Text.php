<?php

namespace Modules\Isite\Http\Livewire\Filters;

use Livewire\Component;

class Text  extends Component
{

  public $status;
  public $type;
  public $emitTo;
  public $repoAction;
  public $repoAttribute;
  public $repoMethod;
  public $layout;
  public $classes;
  public $placeholder;
  public $name;

  public function mount($placeholder, $status = true, $type, $emitTo, $repoAction,
                        $repoAttribute, $repoMethod = 'getItemsBy', $layout = 'text-layout-1',
                        $classes = 'col-12', $name = 'text')
  {
    $this->status = $status;
    $this->type = $type;
    $this->emitTo = $emitTo;
    $this->repoAction = $repoAction;
    $this->repoAttribute = $repoAttribute;
    $this->repoMethod = $repoMethod;
    $this->layout = $layout;
    $this->classes = $classes;
    $this->placeholder = $placeholder;
    $this->name = $name;

  }

  public function render()
  {
    $tpl = 'isite::frontend.livewire.filters.text.layouts.' . $this->layout . '.index';

    $ttpl = $this->layout;
    if (view()->exists($ttpl))
      $tpl = $ttpl;

    return view($tpl);
  }

}