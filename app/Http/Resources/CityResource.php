<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    
    /**
     * Transforma o recurso em uma matriz
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => (int) $this->id,
            'name'       => $this->name,
            'state'      => $this->state,
            'code'       => $this->code,
        ];
    }
}
