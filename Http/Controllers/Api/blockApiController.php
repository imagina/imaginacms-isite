<?php

namespace Modules\Isite\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Isite\Entities\block;
use Modules\Isite\Repositories\blockRepository;

class blockApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(block $model, blockRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
