<?php

namespace Modules\Isite\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Isite\Entities\Template;
use Modules\Isite\Repositories\TemplateRepository;

class TemplateApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Template $model, TemplateRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
