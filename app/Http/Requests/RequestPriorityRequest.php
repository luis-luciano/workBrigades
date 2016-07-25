<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\RequestPriority;

class RequestPriorityRequest extends Request
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
        $requestsPriority= RequestPriority::find($this->route('requestsPriorities'));
        if (isset($requestsPriority)) {
            return 
            [
            'name' => 'required|min:3|max:50|unique:request_priorities,name,'.$requestsPriority->id.',id',
            'color' => 'required|size:7'
            ];
        } else {
            return 
            [
            'name' => 'required|min:3|max:50|unique:request_priorities',
            'color' => 'required|size:7',
            ];
        }
    }
}
