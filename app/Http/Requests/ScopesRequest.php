<?php

namespace App\Http\Requests;

use App\ColonyScope;
use App\Http\Requests\Request;

class ScopesRequest extends Request
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
        //$scope= ColonyScope::find($this->route('colonies.scopes'));

        dd($scope);

        if (isset($scope)) {
            return 
            [
            'name' => 'required|min:3|max:50',
             ];
        } else {
            return 
            [
            'name' => 'required|min:3|max:50',
            ];
        }
    }
}
