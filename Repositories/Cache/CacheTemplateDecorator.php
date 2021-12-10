<?php

namespace Modules\Isite\Repositories\Cache;

use Modules\Isite\Repositories\TemplateRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheTemplateDecorator extends BaseCacheCrudDecorator implements TemplateRepository
{
    public function __construct(TemplateRepository $template)
    {
        parent::__construct();
        $this->entityName = 'isite.templates';
        $this->repository = $template;
    }
}
