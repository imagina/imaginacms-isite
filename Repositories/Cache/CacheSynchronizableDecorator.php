<?php

namespace Modules\Isite\Repositories\Cache;

use Modules\Isite\Repositories\SynchronizableRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheSynchronizableDecorator extends BaseCacheCrudDecorator implements SynchronizableRepository
{
    public function __construct(SynchronizableRepository $synchronizable)
    {
        parent::__construct();
        $this->entityName = 'isite.synchronizables';
        $this->repository = $synchronizable;
    }
}
