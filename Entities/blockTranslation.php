<?php

namespace Modules\Isite\Entities;

use Illuminate\Database\Eloquent\Model;

class blockTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ["title"];
    protected $table = 'isite__block_translations';
}
