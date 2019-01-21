<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TelephoneResource extends JsonResource
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
            'id'             => $this->id,
            'ddd'            => $this->ddd,
            'telephone'      => $this->telephone,
            'telephone_type' => $this->telephone_type,
            'ddi'            => $this->ddi,
        ];
    }
}

