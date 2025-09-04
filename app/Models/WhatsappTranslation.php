<?php

namespace Modules\Isite\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsappTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'country_code',
        'phone',
        'message',
        'label'
    ];
    protected $table = 'isite__whatsapp_translations';
}
