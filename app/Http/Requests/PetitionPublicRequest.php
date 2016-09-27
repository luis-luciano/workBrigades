<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PetitionPublicRequest extends Request
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
            'name' => 'required',
            'paternal_surname' => 'required',
            'maternal_surname' => 'required',
            'email' => 'required',
            'house_phone' => 'required',
            'citizen_colony_id' => 'required|numeric|exists:colonies,id',
            'citizen_street' => 'required',
            'problem_id' => 'required|numeric|exists:problems,id',
            'colony_id' => 'required|numeric|exists:colonies,id',
            'subject' => 'required',
            'street' => 'required',
            'number' => 'required',
            'between_streets' => 'required',
            'reference' => 'required'
        ];
    }
}
