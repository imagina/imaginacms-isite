<?php

namespace Modules\Isite\Http\Controllers\Api;

use Imagina\Icore\Http\Controllers\CoreApiController;
//Model
use Modules\Isite\Models\Contact;
use Modules\Isite\Repositories\ContactRepository;

class ContactApiController extends CoreApiController
{
  public function __construct(Contact $model, ContactRepository $modelRepository)
  {
    parent::__construct($model, $modelRepository);
  }
}
