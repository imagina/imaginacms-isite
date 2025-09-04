<?php

namespace Modules\Isite\Http\Controllers\Api;

use Imagina\Icore\Http\Controllers\CoreApiController;
//Model
use Modules\Isite\Models\Whatsapp;
use Modules\Isite\Repositories\WhatsappRepository;

class WhatsappApiController extends CoreApiController
{
  public function __construct(Whatsapp $model, WhatsappRepository $modelRepository)
  {
    parent::__construct($model, $modelRepository);
  }
}
