<?php

namespace Modules\Isite\Repositories\Cache;

use Modules\Isite\Repositories\blockRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheblockDecorator extends BaseCacheCrudDecorator implements blockRepository
{
    public function __construct(blockRepository $block)
    {
        parent::__construct();
        $this->entityName = 'isite.blocks';
        $this->repository = $block;
    }
}
