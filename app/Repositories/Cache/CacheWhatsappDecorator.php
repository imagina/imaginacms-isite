<?php

namespace Modules\Isite\Repositories\Cache;

use Modules\Isite\Repositories\WhatsappRepository;
use Imagina\Icore\Repositories\Cache\CoreCacheDecorator;

class CacheWhatsappDecorator extends CoreCacheDecorator implements WhatsappRepository
{
    public function __construct(WhatsappRepository $whatsapp)
    {
        parent::__construct();
        $this->entityName = 'isite.whatsapps';
        $this->repository = $whatsapp;
    }
}
