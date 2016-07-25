<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Problem;

class ProblemRequest extends Request
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
        $problem= Problem::find($this->route('problemTypes'));
        if (isset($problem)) {
            return 
            [
            'name' => 'required|min:3|max:50|unique:problems,name,'.$problem->id.',id',
            'typology_id' => 'required|numeric|exists:typologies,id'
            ];
        } else {
            return 
            [
            'name' => 'required|min:3|max:50|unique:problems',
            'typology_id' => 'required|numeric|exists:typologies,id'
            ];
        }
        return [
            
        ];
    }
}
