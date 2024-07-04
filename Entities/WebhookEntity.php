<?php

namespace Modules\Isite\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class WebhookEntity extends CrudModel
{
  use Translatable;

  protected $table = 'isite__webhookentities';
  public $transformer = 'Modules\Isite\Transformers\WebhookEntityTransformer';
  public $repository = 'Modules\Isite\Repositories\WebhookEntityRepository';
  public $requestValidation = [
      'create' => 'Modules\Isite\Http\Requests\CreateWebhookEntityRequest',
      'update' => 'Modules\Isite\Http\Requests\UpdateWebhookEntityRequest',
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
  protected $fillable = [
    'id',
    'module_name',
    'name',
  ];

  public function webhook()
  {
      return $this->hasMany(Webhook::class);
  }

}
