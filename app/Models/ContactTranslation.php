<?php

namespace Modules\Isite\Models;

use Illuminate\Database\Eloquent\Model;

class ContactTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'value'
    ];
    protected $table = 'isite__contact_translations';
}
