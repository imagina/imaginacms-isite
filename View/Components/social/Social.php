<?php

namespace Modules\Isite\View\Components\social;

use Illuminate\View\Component;

class Social extends Component
{


    public $items;
    public $view;
    public $itemLayout;
    public $components;
    public $layout;
    public $type;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($layout = 'social-layout-1', $type = 'circle')
    {
        $this->type = $type;
        $this->view = "isite::frontend.components.social.layouts.{$layout}.index";

    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $this->items = json_decode(setting('isite::socialNetworks'), true);

        return view($this->view);
    }
}
