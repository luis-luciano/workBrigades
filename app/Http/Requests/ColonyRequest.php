<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ColonyRequest extends Request
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
            'name' => 'required|min:3|max:80',
            'zip' => 'required|digits_between:5,6',
            'settlement_type_id' => 'required|numeric|exists:settlement_types,id',
            'colony_scope_id' => 'required|numeric|exists:colony_scopes,id',
            'sector_id' => 'required|numeric|exists:sectors,id',
        ];
    }
}
