<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OccupationRequest extends FormRequest
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
            'code'                       => 'required|digits:20',
            'name'                       => 'required|regex:/^([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-])+((\s*)+([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-]*)*)+$/|between:1,150',
            'political_office'           => 'required|alpha|min:1|max:1',
            'educational_level_required' => 'required|regex:/^([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-])+((\s*)+([a-zA-ZñÑáãâéêíóõôúÁÉÍÓÚ._-]*)*)+$/|between:1,20',
            'responsible_entity'         => 'required|alpha|min:1|max:1',
            'cbo_code'                   => 'required|digits:20',
        ];
    }
}




