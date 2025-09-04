<?php

namespace Modules\Isite\Repositories\Cache;

use Modules\Isite\Repositories\ContactRepository;
use Imagina\Icore\Repositories\Cache\CoreCacheDecorator;

class CacheContactDecorator extends CoreCacheDecorator implements ContactRepository
{
    public function __construct(ContactRepository $contact)
    {
        parent::__construct();
        $this->entityName = 'isite.contacts';
        $this->repository = $contact;
    }
}
