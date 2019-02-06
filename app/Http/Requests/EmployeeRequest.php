<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado a fazer essa solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Obtem as regras de validação que se aplicam à solicitação.
     *
     * @return array
     */
    public function rules()
    {
<<<<<<< HEAD
        return [
            /**
             * Valida os campos de colaborador.
             */
            'name'                                => 'required|regex:/^([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-])+((\s*)+([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-]*)*)+$/|between:1,150',
            'last_name'                           => 'required|regex:/^([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-])+((\s*)+([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-]*)*)+$/|between:1,150',
            'birth_date'                          => 'required|date',
            'gender'                              => 'required|alpha|min:1|max:1',
            'cpf'                                 => 'required|regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
            'blood_type'                          => 'required|string|min:1|max:3',
            'organ_donor'                         => 'required|boolean',
            'assumed_name'                        => 'required|regex:/^([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-])+((\s*)+([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-]*)*)+$/|between:1,150',
            'flag_pwd'                            => 'required|boolean',
            'flag_visually'                       => 'required|boolean',
            'flag_hearing'                        => 'required|boolean',
            'flag_physically'                     => 'required|boolean',
            'flag_intellectually'                 => 'required|boolean',
            'description_other_pwd'               => 'string',
            'first_job_ctps'                      => 'required|alpha_num|min:1|max:4',
            'first_job_public'                    => 'required|alpha_num|min:1|max:4',
            'icd'                                 => 'required|alpha_num|min:1|max:10',
            'country_id'                          => 'required',
            'ethnicity_id'                        => 'required',
            'marital_status_id'                   => 'required',
            'department_id'                       => 'required',
            'occupation_id'                       => 'required',

            /**
             * Valida os campos do endereço.
             */
             'address.neighborhood'               => 'required|regex:/^([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-])+((\s*)+([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-]*)*)+$/|between:1,150',
             'address.street'                     => 'required|regex:/^([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-])+((\s*)+([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-]*)*)+$/|between:1,150',
             'address.street_number'              => 'required|alpha_num|min:1|max:6',
             'address.street_type'                => 'required|regex:/^([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-])+((\s*)+([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-]*)*)+$/|between:1,18',
             'address.zipcode'                    => 'required|regex:/^[0-9]{5}-[0-9]{3}$/|min:9|max:9',
             'address.street_complement'          => 'string|between:1,400',
             'address.state'                      => 'required|alpha|min:2|max:2',

            /**
             * Valida os campos da cidade.
             */
            'city.name'                           => 'required|regex:/^([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-])+((\s*)+([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-]*)*)+$/|between:1,150',
            'city.state'                          => 'required|alpha|min:2|max:2',
            'city.code'                           => 'required|digits:7',

            /**
             * Valida os campos do telefone.
             */
            'telephone.ddd'                       => 'required|alpha_num|min:1|max:4',
            'telephone.telephone'                 => 'required|regex:/(\(?\d{2}\)?) ?9?\d{4}-?\d{4}/|min:1|max:15',
            'telephone.telephone_type'            => 'required|string|between:1,20',
            'telephone.ddi'                       => 'required|alpha_num|min:1|max:6',

            /**
             * Valida os campos de e-mail.
             */
            'email.email'                         => 'required|email|between:1,150',
            'email.email_type'                    => 'required|string|between:1,150',

            /**
             * Valida os campos do dependente.
             */
            'dependents.*.name'                   => 'required|regex:/^([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-])+((\s*)+([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-]*)*)+$/|between:1,150',
            'dependents.*.birth_date'             => 'required|date',
            'dependents.*.cpf'                    => 'required|regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
            'dependents.*.dependent_type_id'      => 'required',
=======
        $rules = [
            'name'                                => 'required',
            'last_name'                           => 'required',
            'birth_date'                          => 'required',
            'gender'                              => 'required',
            'cpf'                                 => 'required',
        ];
>>>>>>> 8a92183275e5ba70f04e7faac268c54568539c5c

        if($this->has('id')){

             $rules = [
                 /**
                  * Valida os campos do endereço.
                  */
                 'address.neighborhood'               => 'required',
                 'address.street'                     => 'required',
                 'address.street_number'              => 'required',
                 'address.street_type'                => 'required',
                 'address.zipcode'                    => 'required',
                 'address.state'                      => 'required',

                /**
                 * Valida os campos da cidade.
                 */
                'city.name'                           => 'required',
                'city.state'                          => 'required',
                'city.code'                           => 'required',

<<<<<<< HEAD
            /**
             * Valida os campos de contrato de trabalho.
             */
            'work_contract.hiring_date'           => 'required|date',
            'work_contract.end_date'              => 'required|date',
            'work_contract.examination_date'      => 'required|date',
            'work_contract.dismissal_date'        => 'required|date',
            'work_contract.flag_fixed_term'       => 'required|boolean',
            'work_contract.term'                  => 'required|numeric',
            'work_contract.new_end_date'          => 'required|date',
            'work_contract.new_term'              => 'required|numeric',
            'work_contract.contracting_regime_id' => 'required',
=======
                /**
                 * Valida os campos do telefone.
                 */
                'telephone.telephone'                 => 'required',
                'telephone.telephone_type'            => 'required',
>>>>>>> 8a92183275e5ba70f04e7faac268c54568539c5c

                /**
                 * Valida os campos de e-mail.
                 */
                'email.email'                         => 'required',
                'email.email_type'                    => 'required',
            ];
        }
        return $rules;
    }
}
