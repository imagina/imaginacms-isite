<?php

namespace Modules\Isite\Models;

use Imagina\Icore\Models\CoreStaticModel;

class Status extends CoreStaticModel
{
  const INACTIVE = 0;
  const ACTIVE = 1;



  public function __construct()
  {
    $this->records = [
      self::INACTIVE => [
        'id' => self::INACTIVE,
        'title' => itrans('isite::status.inactive'),
      ],
      self::ACTIVE => [
        'id' => self::ACTIVE,
        'title' => itrans('isite::status.active'),
      ],
    ];
  }
}
