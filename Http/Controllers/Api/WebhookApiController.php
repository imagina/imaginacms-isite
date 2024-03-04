<?php

namespace Modules\Isite\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Isite\Entities\Webhook;
use Modules\Isite\Repositories\WebhookRepository;

class WebhookApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Webhook $model, WebhookRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
