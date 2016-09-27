<?php

namespace App\Http\Requests;

use App\ColonyScope;
use App\Http\Requests\Request;

class ColonyScopeRequest extends Request
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
        $scope= $this->route('scopes');
       // DD($scope);
        
        if (isset($scope)) {
            return 
            [
            'name' => 'required|min:1|max:50|unique:colony_scopes,name,'.$scope->name.',id',
            
            ];
        } else {
            return 
            [
            'name' => 'required|min:1|max:50|unique:colony_scopes',
            
            ];
        }
    
    }
}
