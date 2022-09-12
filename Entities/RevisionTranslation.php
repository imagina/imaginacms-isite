<?php

namespace Modules\Isite\Entities;

use Illuminate\Database\Eloquent\Model;

class RevisionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'isite__revision_translations';
}
