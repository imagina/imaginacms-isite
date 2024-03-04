<?php

namespace Modules\Isite\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Isite\Entities\Event;
use Modules\Isite\Repositories\EventRepository;

class EventApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Event $model, EventRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
