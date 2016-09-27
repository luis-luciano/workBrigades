<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SupervisionRequest extends Request
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
        $supervision= $this->route('supervisions');
        
        if (isset($supervision)) {
            return 
            [
            'name' => 'required|min:3|max:80|unique:supervisions,name,'.$supervision->name,
            'phone' => 'required|max:50',
            'extension' => 'max:50',
            ];
        } else {
            return 
            [
            'name' => 'required|min:3|max:80|unique:supervisions',
            'phone' => 'required|max:50',
            'extension' => 'max:50'            
            ];
        }
    }
}
