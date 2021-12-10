<?php

namespace Modules\Isite\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class Template extends CrudModel
{
    use Translatable;

    protected $table = 'isite__templates';
    public $transformer = 'Modules\Isite\Transformers\TemplateTransformer';
    public $requestValidation = [
        'create' => 'Modules\Isite\Http\Requests\CreateTemplateRequest',
        'update' => 'Modules\Isite\Http\Requests\UpdateTemplateRequest',
      ];
    public $translatedAttributes = [];
    protected $fillable = [];
}
