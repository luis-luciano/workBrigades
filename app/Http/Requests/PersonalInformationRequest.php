<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonalInformationRequest extends Request
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
        //dd('hola');
        return [
            'birthday' => 'max:80',
            'represent' => 'max:80',
            'house_phone' => 'numeric|size:10',
            'mobile_phone' => 'numeric|size:10',
            'fax' => 'numeric|size:10',
            'street' => 'max:80',
            'number' => 'max:80',
            'interior' => 'max:80',
            'colony_id' => 'required|numeric|exists:colonies,id',
            'profession'=> 'max:80',
        ];
    }
}
