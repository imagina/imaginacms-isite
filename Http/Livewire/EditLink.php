<?php

namespace Modules\Isite\Http\Livewire;

use Livewire\Component;

class EditLink extends Component
{

    public $top;
    public $bottom;
    public $right;
    public $left;
    public $user;
    public $link;
    public $canAccess;
    public $tooltip;
    public $classes;
    public $idButton;
    public $item;
    public $icon;
    public $bgColor;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount(
        $link,
        $tooltip = null,
        $classes = null,
        $top = null,
        $bottom = null,
        $right = null,
        $left = null,
        $idButton = null,
        $item = null,
        $icon = null,
        $bgColor = null
    )
    {
        $this->top = $top ?? '15%';
        $this->bottom = $bottom ?? 'unset';
        $this->right = $right ?? 'unset';
        $this->left = $left ?? '15%';
        $this->link = $link ?? \URL::link('/');
        $this->canAccess = false;
        $this->tooltip = $tooltip ?? trans("isite::common.editLink.tooltip");
        $this->item = $item;
        $this->icon = $icon ?? 'fa fa-pencil';
        $this->bgColor = $bgColor ?? 'dodgerblue';
    }

    public function refreshEditButton()
    {
        $user = \Auth::user();
        if (isset($user->id)) {
            $permissionController = app("Modules\Ihelpers\Http\Controllers\Api\PermissionsApiController");
            $permissions = $permissionController->getAll(["userId" => $user->id]);

            if (isset($permissions['isite.edit-link.manage']) && $permissions['isite.edit-link.manage']) {
                $this->canAccess = true;
            }
        }
        if (isset($item->id)) {
            if ($this->link == "/iadmin/#/slider/show/" . $item->id) {
                $this->link = "/iadmin/#/slider/show/" . $item->slider_id . "?edit=" . $item->id;
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view("isite::frontend.livewire.edit-link.index");
    }

}