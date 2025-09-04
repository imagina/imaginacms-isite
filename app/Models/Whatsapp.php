<?php

namespace Modules\Isite\Models;

use Astrotomic\Translatable\Translatable;
use Imagina\Icore\Models\CoreModel;

class Whatsapp extends CoreModel
{
  use Translatable;

  protected $table = 'isite__whatsapps';
  public string $transformer = 'Modules\Isite\Transformers\WhatsappTransformer';
  public string $repository = 'Modules\Isite\Repositories\WhatsappRepository';
  public array $requestValidation = [
    'create' => 'Modules\Isite\Http\Requests\CreateWhatsappRequest',
    'update' => 'Modules\Isite\Http\Requests\UpdateWhatsappRequest',
  ];
  //Instance external/internal events to dispatch with extraData
  public array $dispatchesEventsWithBindings = [
    //eg. ['path' => 'path/module/event', 'extraData' => [/*...optional*/]]
    'created' => [],
    'creating' => [],
    'updated' => [],
    'updating' => [],
    'deleting' => [],
    'deleted' => []
  ];
  public array $translatedAttributes = [
    'country_code',
    'phone',
    'message',
    'label'
  ];
  protected $fillable = [
    'icon'
  ];
}
