<?php

namespace Modules\Isite\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class Webhook extends CrudModel
{
  use Translatable;

  protected $table = 'isite__webhooks';
  public $transformer = 'Modules\Isite\Transformers\WebhookTransformer';
  public $repository = 'Modules\Isite\Repositories\WebhookRepository';
  public $requestValidation = [
      'create' => 'Modules\Isite\Http\Requests\CreateWebhookRequest',
      'update' => 'Modules\Isite\Http\Requests\UpdateWebhookRequest',
    ];
  //Instance external/internal events to dispatch with extraData
  public $dispatchesEventsWithBindings = [
    //eg. ['path' => 'path/module/event', 'extraData' => [/*...optional*/]]
    'created' => [],
    'creating' => [],
    'updated' => [],
    'updating' => [],
    'deleting' => [],
    'deleted' => []
  ];
  public $translatedAttributes = [];
  protected $fillable = [];
}
