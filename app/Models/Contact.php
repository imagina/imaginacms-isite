<?php

namespace Modules\Isite\Models;

use Astrotomic\Translatable\Translatable;
use Imagina\Icore\Models\CoreModel;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Contact extends CoreModel
{
  use Translatable;

  protected $table = 'isite__contacts';
  public string $transformer = 'Modules\Isite\Transformers\ContactTransformer';
  public string $repository = 'Modules\Isite\Repositories\ContactRepository';
  public array $requestValidation = [
    'create' => 'Modules\Isite\Http\Requests\CreateContactRequest',
    'update' => 'Modules\Isite\Http\Requests\UpdateContactRequest',
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
    'title',
    'value'
  ];
  protected $fillable = [
    'system_name',
    'type_id',
    'status_id'
  ];

  protected $appends = [
    'type',
    'status'
  ];

  public function type(): Attribute
  {
    return Attribute::get(function () {
      $type = new ContactType();
      return $type->show($this->type_id);
    });
  }

  public function status(): Attribute
  {
    return Attribute::get(function () {
      $status = new Status();
      return $status->show($this->status_id);
    });
  }
}
