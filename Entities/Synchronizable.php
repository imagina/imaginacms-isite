<?php

namespace Modules\Isite\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class Synchronizable extends CrudModel
{
  use Translatable;

  protected $table = 'isite__synchronizables';
  public $transformer = 'Modules\Isite\Transformers\SynchronizableTransformer';
  public $repository = 'Modules\Isite\Repositories\SynchronizableRepository';
  public $requestValidation = [
      'create' => 'Modules\Isite\Http\Requests\CreateSynchronizableRequest',
      'update' => 'Modules\Isite\Http\Requests\UpdateSynchronizableRequest',
    ];
  //Instance external/internal events to dispatch with extraData
  public $dispatchesEventsWithBindings = [
    //eg. ['path' => 'path/module/event', 'extraData' => [/*...optional*/]]
    'created' => [],
    'creating' => [],
    'updated' => [
      [
        'path' => 'Modules\Isite\Events\SynchronizableWasUpdated'
      ]
    ],
    'updating' => [],
    'deleting' => [],
    'deleted' => []
  ];
  public $translatedAttributes = [];
  protected $fillable = [
      'sheet_id',
      'name',
      'enabled',
      'is_running',
      'enabled_emails',
      'last_sync',
      'exported_by_id'
  ];
}
