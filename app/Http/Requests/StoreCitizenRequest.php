<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreCitizenRequest extends Request
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
                'name' => 'required|max:80',
                'paternal_surname' => 'required|max:80',
                'maternal_surname' => 'max:80',
                'sex' => 'required|size:1',
                'email' => 'email|min:3|max:255',
                'birthday' => 'date',
                'represent' => 'max:80',
                'house_phone' => 'max:50',
                'mobile_phone' => 'max:50',
                'fax' => 'max:50',
                'street' => 'max:80',
                'number' => 'max:50',
                'interior' => 'max:50',
                'profession' => 'max:80',
                //'colony_id' => 'required|numeric|exists:colonies,id,deleted_at,NULL',
                'colony_id' => 'required|numeric|exists:colonies,id',
        ];
    }
}
