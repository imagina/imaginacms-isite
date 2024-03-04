<?php

namespace Modules\Isite\Repositories\Cache;

use Modules\Isite\Repositories\EventRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheEventDecorator extends BaseCacheCrudDecorator implements EventRepository
{
    public function __construct(EventRepository $event)
    {
        parent::__construct();
        $this->entityName = 'isite.events';
        $this->repository = $event;
    }
}
