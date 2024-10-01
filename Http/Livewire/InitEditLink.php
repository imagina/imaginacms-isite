<?php

namespace Modules\Isite\Http\Livewire;

use Livewire\Component;

class InitEditLink extends Component
{
  public $canAccess;

  public function mount() {
    $this->canAccess = false;
  }

  public function refreshEditButton()
  {
    $user = \Auth::user();
    if (isset($user->id)) {
      $permissionController = app("Modules\Ihelpers\Http\Controllers\Api\PermissionsApiController");
      $permissions = $permissionController->getAll(["userId" => $user->id]);

      if (isset($permissions['isite.edit-link.manage']) && $permissions['isite.edit-link.manage']) {
        $this->canAccess = true;
        $this->emit('canAccessEditLink', $this->canAccess);
      }
    }
    if (isset($item->id)) {
      if ($this->link == "/iadmin/#/slider/show/" . $item->id) {
        $this->link = "/iadmin/#/slider/show/" . $item->slider_id . "?edit=" . $item->id;
      }
    }
  }

  /*
  * Render
  *
  */
  public function render()
  {
    return view("isite::frontend.livewire.init-edit-link.index");
  }

}