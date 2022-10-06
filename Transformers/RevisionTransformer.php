<?php

namespace Modules\Isite\Transformers;

use Modules\Core\Icrud\Transformers\CrudResource;

class RevisionTransformer extends CrudResource
{
  /**
  * Method to merge values with response
  *
  * @return array
  */
  public function modelAttributes($request)
  {
    return [];
  }

  public function toArray($request)
  {
    $entity = new $this->revisionable_type(json_decode($this->old_value,true));

    $data = [
      'id' => $this->when($this->id, $this->id),
      'userId' => $this->when($this->user_id, $this->user_id),
      'key' => $this->when($this->key, $this->key),
      'createdAt'=> $this->when($this->created_at, $this->created_at),
      'updatedAt'=> $this->when($this->updated_at, $this->updated_at),
      'entity' => new $entity->transformer($entity)
    ];

    return $data;
  }
}
