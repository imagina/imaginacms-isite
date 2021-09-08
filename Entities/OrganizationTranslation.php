<?php

namespace Modules\Isite\Entities;

use Illuminate\Database\Eloquent\Model;

class OrganizationTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'isite__organization_translations';
}
