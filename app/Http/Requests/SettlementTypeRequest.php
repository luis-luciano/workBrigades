<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\SettlementType;

class SettlementTypeRequest extends Request
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
        $settlementType= $this->route('settlement_types');
        
        if (isset($settlementType)) {
            return 
            [
            'name' => 'required|min:1|max:50|unique:settlement_types,name,'.$settlementType->name.',id',
            
            ];
        } else {
            return 
            [
            'name' => 'required|min:1|max:50|unique:settlement_types',
            
            ];
        }
    }
}
