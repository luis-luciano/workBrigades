<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RequestPublicRequest extends Request
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
            'problem_id' => 'required|numeric|exists:problems,id',
            'colony_id' => 'required|numeric|exists:colonies,id',
            'subject' => 'required|max:80',
            'street' => 'required|max:80',
            'number' => 'numeric',
            'between_streets' => 'required|max:80',
            'reference' => 'required|max:80',
            'name' => 'required|min:3|max:50',
            'paternal_surname' => 'required|min:3|max:50',
            'maternal_surname' => 'min:3|max:50',
            'email' => '',
            'house_phone' => 'required|numeric',
        ];
    }
}
