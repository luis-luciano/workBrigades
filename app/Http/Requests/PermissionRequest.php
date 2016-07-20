<?php

namespace App\Http\Requests;

use App\Http\Requests\PermissionRequest;
use App\Http\Requests\Request;

class PermissionRequest extends Request
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
        $state= PermissionRequest::find($this->route('requestsStates'));
        if (isset($state)) {
            return 
            [
            'name' => 'required|unique:request_states,name,'.$state->id.',id',
            'label' => 'required|unique:request_states,label,'.$state->id.',id',
            'color' => 'required|size:7'
            ];
        } else {
            return 
            [
            'name' => 'required|unique:request_states',
            'label' => 'required',
            'color' => 'required|size:7'
            ];
        }
    }
}
