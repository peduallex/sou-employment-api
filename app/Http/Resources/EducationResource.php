<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
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
            'id'                     => $this->id,
            'course'                 => $this->course,
            'education_level'        => $this->education_level,
            'education_institution'  => $this->education_institution,
            'starting_date'          => $this->starting_date,
            'finishing_date'         => $this->finishing_date,
        ];
    }
}
