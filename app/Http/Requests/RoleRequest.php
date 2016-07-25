<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Role;

class RoleRequest extends Request
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
        
        $role= Role::find($this->route('roles'));
        if (isset($role)) {
            return 
            [
            'name' => 'required|min:3|max:50|unique:roles,name,'.$role->id.',id',
            'label' => 'required|min:3|max:50|unique:roles,label,'.$role->id.',id',
            'home' => 'required|min:3|max:50|unique:roles,home,'.$role->id.',id',
            'permissions_list' => 'required|array'
            ];
        } else {
            return 
            [
            'name' => 'required|min:3|max:50|unique:roles',
            'label' => 'required|min:3|max:50|unique:roles',
            'home' => 'required|min:3|max:50|unique:roles',
            'permissions_list' => 'required|array'
            ];
        }
        
    }
}
