<?php

namespace Modules\Isite\Entities;

use Illuminate\Database\Eloquent\Model;

class TemplateTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'isite__template_translations';
}
