<?php

namespace Modules\Isite\Transformers;

use Imagina\Icore\Transformers\CoreResource;

class ContactTransformer extends CoreResource
{
  /**
   * Attribute to exclude relations from transformed data
   * @var array
   */
  protected array $excludeRelations = [];

  /**
   * Method to merge values with response
   *
   * @return array
   */
  public function modelAttributes($request): array
  {
    return [];
  }
}
