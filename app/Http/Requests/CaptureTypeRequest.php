<?php

namespace App\Http\Requests;

use App\CaptureType;
use App\Http\Requests\Request;

class CaptureTypeRequest extends Request
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
        $captureType= CaptureType::find($this->route('captureTypes'));
        if (isset($captureType)) {
            return 
            [
            'name' => 'required|min:3|max:50|unique:capture_types,name,'.$captureType->name.',id',
            'color' => 'required|size:7'
            ];
        } else {
            return 
            [
            'name' => 'required|min:3|max:50|unique:capture_types',
            'color' => 'required|size:7',
            ];
        }
        return [
            
        ];
    }
}
