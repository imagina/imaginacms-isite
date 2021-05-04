<?php

namespace Modules\Isite\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class RecommendationTransformer extends JsonResource
{
  public function toArray($request)
  {
    $data = [
      'id' => $this->when($this->id, $this->id),
      'title' => $this->when($this->title, $this->title),
      'description' => $this->when($this->description, $this->description),
      'name' => $this->when($this->name, $this->name),
      'icon' => $this->when($this->icon, $this->icon),
      'createdAt' => $this->when($this->created_at, $this->created_at),
      'updatedAt' => $this->when($this->updated_at, $this->updated_at),
    
    ];
    
    return $data;
    
  }
}
