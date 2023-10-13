<?php

namespace Modules\Isite\Repositories\Cache;

use Modules\Isite\Repositories\CategoryRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheCategoryDecorator extends BaseCacheCrudDecorator implements CategoryRepository
{
    public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->entityName = 'isite.categories';
        $this->repository = $category;
    }
}
