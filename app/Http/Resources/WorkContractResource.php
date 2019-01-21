<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkContractResource extends JsonResource
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
            'hiring_date'        => $this->hiring_date,
            'end_date'           => $this->end_date,
            'examination_date'   => $this->examination_date,
            'dismissal_date'     => $this->dismissal_date,
            'flag_fixed_term'    => $this->flag_fixed_term,
            'term'               => $this->term,
            'new_end_date'       => $this->new_end_date,
            'new_term'           => $this->new_term,
            'contracting_regime' => $this->contracting_regime,
            'tax_benefits'       => TaxBenefitResource::collection($this->tax_benefits),
        ];
    }
}
