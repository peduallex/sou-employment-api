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
        $rules = [
            'name'                                => 'required',
            'last_name'                           => 'required',
            'birth_date'                          => 'required',
            'gender'                              => 'required',
            'cpf'                                 => 'required',
        ];

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

                /**
                 * Valida os campos do telefone.
                 */
                'telephone.telephone'                 => 'required',
                'telephone.telephone_type'            => 'required',

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
