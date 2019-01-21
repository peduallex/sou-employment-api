<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DependentResource extends JsonResource
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
            'id'                 => $this->id,
            'name'               => $this->name,
            'birth_date'         => $this->birth_date,
            'cpf'                => $this->cpf,            
            'dependent_type'     => $this->dependent_type,
        ];
    }
}
