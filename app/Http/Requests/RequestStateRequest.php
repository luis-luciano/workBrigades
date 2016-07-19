<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\RequestState;

class RequestStateRequest extends Request
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
        $state= RequestState::find($this->route('requestsStates'));
        if (isset($state)) {
            return 
            [
            'name' => 'required|unique:request_states,name,'.$state->id.',id',
            'label' => 'required',
            'color' => 'required'
            ];
        } else {
            return 
            [
            'name' => 'required|unique:request_states',
            'label' => 'required',
            'color' => 'required'
            ];
        }
        
       
    }
}
