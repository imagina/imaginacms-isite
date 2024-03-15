<?php

namespace Modules\Isite\Repositories\Cache;

use Modules\Isite\Repositories\WebhookRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheWebhookDecorator extends BaseCacheCrudDecorator implements WebhookRepository
{
    public function __construct(WebhookRepository $webhook)
    {
        parent::__construct();
        $this->entityName = 'isite.webhooks';
        $this->repository = $webhook;
    }
}
