<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code'              => 'required|digits:3',
            'name'              => 'required|regex:/^([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-])+((\s*)+([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-]*)*)+$/|between:1,150',
            'portuguese_name'   => 'required|regex:/^([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-])+((\s*)+([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-]*)*)+$/|between:1,150',
            'iso_alfa'          => 'required|alpha|min:3|max:3',
        ];
    }

}
