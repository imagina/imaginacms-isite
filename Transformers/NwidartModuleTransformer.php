<?php

namespace Modules\Isite\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class NwidartModuleTransformer extends JsonResource
{
    /**
     * Method to merge values with response
     */
    public function toArray($request)
    {
        $title = $this->getName() == 'Icustom' ? trans('isite::isite.icustom') : trans($this->getAlias().'::'.$this->getAlias().'.name');

        $data = [
            'name' => $this->getName(),
            'enabled' => $this->isEnabled(),
            'title' => $title,
            'alias' => $this->getAlias(),
        ];

        return $data;
    }
}
