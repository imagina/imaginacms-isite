<?php

namespace Modules\Isite\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Isite\Entities\Revision;
use Modules\Isite\Repositories\RevisionRepository;

class RevisionApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Revision $model, RevisionRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
