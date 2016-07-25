<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TypologyRequest extends Request
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
        $typology= $this->route('typologies');
        
        if (isset($typology)) {
            return 
            [
            'name' => "required|min:3|max:80|unique:typologies,name,$typology",
            'supervisions_list' => 'required|array'
            ];
        } else {
            return 
            [
            'name' => 'required|min:3|max:80|unique:typologies',
            'supervisions_list' => 'required|array'
            ];
        }
    }
}
