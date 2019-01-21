<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'id'                    => $this->id,
            'name'                  => $this->name,
            'last_name'             => $this->last_name,
            'birth_date'            => $this->birth_date,
            'gender'                => $this->gender,
            'cpf'                   => $this->cpf,
            'blood_type'            => $this->blood_type,
            'organ_donor'           => $this->organ_donor,
            'assumed_name'          => $this->assumed_name,
            'flag_pwd'              => $this->flag_pwd,
            'flag_visually'         => $this->flag_visually,
            'flag_hearing'          => $this->flag_hearing,
            'flag_physically'       => $this->flag_physically,
            'flag_intellectually'   => $this->flag_intellectually,
            'description_other_pwd' => $this->description_other_pwd,
            'first_job_ctps'        => $this->first_job_ctps,
            'first_job_public'      => $this->first_job_public,
            'icd'                   => $this->icd,
            'country'               => $this->country,
            'nationality'           => $this->nationality,
            'ethnicity'             => $this->ethnicity,
            'marital_status'        => $this->marital_status,
            'address'               => $this->address,
            'city'                  => $this->city,
            'telephones'            => TelephoneResource::collection($this->telephones),
            'emails'                => EmailResource::collection($this->emails),
            'department'            => $this->department,
            'dependents'            => DependentResource::collection($this->dependents),
            'education'             => EducationResource::collection($this->education),
            'parentages'            => ParentageResource::collection($this->parentages),
            'occupation'            => $this->occupation,
            'identities'            => IdentityResource::collection($this->identities),
            'work_contracts'        => WorkContractResource::collection($this->work_contracts),
        ];

    }
}
