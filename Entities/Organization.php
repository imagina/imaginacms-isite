<?php

namespace Modules\Isite\Entities;

use Astrotomic\Translatable\Translatable;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Modules\Core\Support\Traits\AuditTrait;
use Illuminate\Support\Str;
use Modules\Media\Support\Traits\MediaRelation;
use Modules\Ischedulable\Support\Traits\Schedulable;
use Modules\Core\Icrud\Traits\hasEventsWithBindings;
use Modules\Ifillable\Traits\isFillable;
use Modules\Setting\Entities\Setting;

class Organization extends BaseTenant
{
  use AuditTrait, Translatable, HasDomains, MediaRelation, Schedulable, hasEventsWithBindings, isFillable;

  public $transformer = 'Modules\Isite\Transformers\OrganizationTransformer';
  public $requestValidation = [
    'create' => 'Modules\Isite\Http\Requests\CreateOrganizationRequest',
    'update' => 'Modules\Isite\Http\Requests\UpdateOrganizationRequest',
  ];
  protected $table = 'isite__organizations';
  public $translatedAttributes = [
    'title',
    'slug',
    'description',
    'meta_title',
    'meta_description',
    'translatable_options'
  ];
  protected $fillable = [
    'options',
    'user_id',
    'featured',
    'permissions',
    'category_id',
    'status',
    'enable',
    'sort_order'
  ];
  protected $casts = [
    'options' => 'array',
  ];

  public static function getCustomColumns(): array
  {
    return [
      'id',
      'options',
      'user_id',
      'featured',
      'permissions',
      'status',
      'sort_order',
      'category_id',
      'created_by',
      'updated_by',
      'deleted_by',
    ];
  }

  public function getIncrementing()
  {
    return true;
  }

  public function category()
  {
    return $this->belognsTo(Category::class);
  }

  public function domains()
  {
    return $this->hasMany(Domain::class);
  }
  
  
  public function settings()
  {
    return $this->hasMany(Setting::class);
  }

  public function getUrlAttribute()
  {

    $currentLocale = \LaravelLocalization::getCurrentLocale();

    $slug = $this->domains->first()->domain ?? $this->slug;
    $domains = $this->domains;
    if ($slug)
      return $domains->where("type","custom")->first()->domain ?? $domains->where("type","default")->first()->domain.Str::remove('https://', env('APP_URL', 'localhost'));
    else
      return "";

  }

  public function users()
  {

    $driver = config('asgard.user.config.driver');
    return $this->belongsToMany("Modules\\User\\Entities\\{$driver}\\User", 'isite__user_organization')
      ->withPivot('id', 'permissions', 'role_id')
      ->withTimestamps();
  }
}
