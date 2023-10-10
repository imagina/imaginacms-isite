<?php

namespace Modules\Isite\Events;

class SyncrhonizableWasUpdated
{
  public $model;

  /*
  *  updatedWithBindings Params - From Entity
  */
  public function __construct($model = null)
  {
    $this->model = $model;
  }

}