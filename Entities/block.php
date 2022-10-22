<?php

namespace Modules\Isite\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class block extends CrudModel
{
  use Translatable;

  protected $table = 'isite__blocks';
  public $transformer = 'Modules\Isite\Transformers\blockTransformer';
  public $requestValidation = [
    'create' => 'Modules\Isite\Http\Requests\CreateblockRequest',
    'update' => 'Modules\Isite\Http\Requests\UpdateblockRequest',
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
  public $translatedAttributes = ["title"];
  protected $fillable = ["system_name", "attributes", "title"];
  protected $casts = ['attributes' => 'array'];
}
