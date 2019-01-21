<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'neighborhood'       => $this->neighborhood,
            'street'             => $this->street,
            'street_number'      => $this->street_number,
            'street_type'        => $this->street_type,
            'zipcode'            => $this->zipcode,
            'street_complement'  => $this->street_complement,
            'state'              => $this->state,
            'city'               => $this->city,
        ];
    }
}
