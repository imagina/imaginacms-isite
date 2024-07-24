<?php

namespace Modules\Isite\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class Recommendation extends CrudModel
{
    use Translatable;

    protected $table = 'isite__recommendations';
    public $transformer = 'Modules\Isite\Transformers\RecommendationTransformer';
    public $repository = 'Modules\Isite\Repositories\RecommendationRepository';

    public $dispatchesEventsWithBindings = [
      //eg. ['path' => 'path/module/event', 'extraData' => [/*...optional*/]]
      'created' => [],
      'creating' => [],
      'updated' => [],
      'updating' => [],
      'deleting' => [],
      'deleted' => []
    ];

    public $translatedAttributes = [
        'title',
        'description',
    ];

    protected $fillable = [
        'name',
        'icon',
    ];
}
