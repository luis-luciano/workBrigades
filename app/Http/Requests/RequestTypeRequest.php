<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\RequestType;

class RequestTypeRequest extends Request
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
        $requestType= RequestType::find($this->route('requestTypes'));
        if (isset($requestType)) {
            return 
            [
            'name' => 'required|min:3|max:50|unique:request_types,name,'.$requestType->name.',id',
            'color' => 'required|size:7'
            ];
        } else {
            return 
            [
            'name' => 'required|min:3|max:50|unique:request_types',
            'color' => 'required|size:7',
            ];
        }
    }
}
