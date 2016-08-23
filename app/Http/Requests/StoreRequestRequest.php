<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreRequestRequest extends Request
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
            'citizen_id' => 'required',
            'subject' => 'required|min:4',
            'colony_id'=> 'required|not_in:1',
            'brigade_id' => 'required|exists:brigades,id',
            'typology_id' => 'required|exists:typologies,id',
            'problem_id' => 'required|exists:problems,id',
            'request_priority_id' => 'required|exists:request_priorities,id',
            'number' => 'numeric|max:10000',
            'street' => 'min:2|max:80',
            'between_streets' => 'min:2',
        ];
    }
}
