<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Sector;

class SectorRequest extends Request
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
        $sector= Sector::find($this->route('sectors'));
        if (isset($sector)) {
            return 
            [
            'number' => 'required|min:1|max:50|unique:sectors,number,'.$sector->number.',id',
            
            ];
        } else {
            return 
            [
            'number' => 'required|min:1|max:50|unique:sectors',
            
            ];
        }
        
    }
}
