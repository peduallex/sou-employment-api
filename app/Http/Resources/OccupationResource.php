<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OccupationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                         => $this->id,
            'code'                       => $this->code,
            'name'                       => $this->name,
            'political_office'           => $this->political_office,
            'educational_level_required' => $this->educational_level_required,
            'responsible_entity'         => $this->responsible_entity,
            'cbo_code'                   => $this->cbo_code,
        ];
    }
}





