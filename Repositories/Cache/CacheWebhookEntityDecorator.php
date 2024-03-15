<?php

namespace Modules\Isite\Repositories\Cache;

use Modules\Isite\Repositories\WebhookEntityRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheWebhookEntityDecorator extends BaseCacheCrudDecorator implements WebhookEntityRepository
{
    public function __construct(WebhookEntityRepository $webhookentity)
    {
        parent::__construct();
        $this->entityName = 'isite.webhookentities';
        $this->repository = $webhookentity;
    }
}
