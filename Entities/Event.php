<?php

namespace Modules\Isite\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class Event extends CrudModel
{
  use Translatable;

  protected $table = 'isite__events';
  public $transformer = 'Modules\Isite\Transformers\EventTransformer';
  public $repository = 'Modules\Isite\Repositories\EventRepository';
  public $requestValidation = [
      'create' => 'Modules\Isite\Http\Requests\CreateEventRequest',
      'update' => 'Modules\Isite\Http\Requests\UpdateEventRequest',
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

  public function webhooks()
  {
    return $this->hasMany(webhooks::class);
  }
}
