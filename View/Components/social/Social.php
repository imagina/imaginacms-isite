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
    public $customIcons;
    public $id;
    public $position;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($layout = 'social-layout-1', $type = '', $customIcons = [], $id = 'socialComponent', $position = 'static')
    {
        $this->type = $type;
        $this->view = "isite::frontend.components.social.layouts.{$layout}.index";
        $this->customIcons = $customIcons;
        $this->id = $id ?? 'socialComponent';
        $this->position = $position ?? 'static';

    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $items = json_decode(setting('isite::socialNetworks'), true);

        $this->items = [];

        foreach($items as $key => $value){
            $this->items[isset($this->customIcons[$key]) ? $this->customIcons[$key] : 'fa fa-'.$key] = $value;
        }

        return view($this->view);
    }
}
