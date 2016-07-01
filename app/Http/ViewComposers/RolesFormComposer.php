<?php

namespace App\Http\ViewComposers;

use App\Permission;
use Illuminate\Contracts\View\View;

class RolesFormComposer
{
    public function compose(View $view)
    {
        $view->with('permissions', Permission::lists('label', 'id'));
    }
}
