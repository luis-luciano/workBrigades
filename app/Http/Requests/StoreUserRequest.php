<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUserRequest extends Request
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
        $user= $this->route('users');
        
        if (isset($user)) {
            return 
            [
            'name' => 'required|min:3|max:50',
            'paternal_surname' => 'required|min:3|max:50',
            'maternal_surname' => 'required|min:3|max:50',
            'sex' => 'required',
            'email' => 'required|min:3|max:80|unique:users,email,'.$user->id.',id',
            'sub_email' => 'email|different:email|min:3|max:255',
            'is_active' => 'required',
            'roles_list' => 'required|array',
            'password' => 'confirmed|min:6|max:255',
            ];
        } else {
            return 
            [
            'name' => 'required|min:3|max:50',
            'paternal_surname' => 'required|min:3|max:50',
            'maternal_surname' => 'required|min:3|max:50',
            'sex' => 'required',
            'email' => 'required|min:3|max:80|unique:users',
            'password' => 'required|confirmed|min:6|max:255',
            'sub_email' => 'email|different:email|min:3|max:255',
            'is_active' => 'required',
            'roles_list' => 'required|array'
            ];
        }



        return [
            'name' => 'required|min:3|max:50',
            'paternar_surname' => 'required|min:3|max:50',
            'maternal_surname' => 'required|min:3|max:50',
            'sex' => 'required',
            'email' => 'required|min:3|max:80|unique:users',
            'password' => 'required|max:50',
            'password_confirmation' => 'max:50',
            'sub_email' => 'email|different:email|min:3|max:255',
            'is_active' => 'required',
            'roles_list' => 'required|array'
        ];
    }
}
