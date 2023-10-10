<?php

namespace Modules\Isite\Events;

class SynchronizableWasUpdated
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