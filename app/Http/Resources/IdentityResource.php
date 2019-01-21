<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IdentityResource extends JsonResource
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
            'date_issued'    => $this->date_issued,
            'description'    => $this->description,
            'number'         => $this->number,
            'series_number'  => $this->series_number,
            'state_issued'   => $this->state_issued,
            'state_issued'   => $this->state_issued,
            'zone'           => $this->zone,
            'section'        => $this->section,
            'identity_type'  => $this->identity_type,
            'issuing_entity' => $this->issuing_entity,
        ];
    }
}







