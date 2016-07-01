<?php

namespace App\Http\ViewComposers;

use App\Colony;
use Illuminate\Contracts\View\View;

class CitizensFormComposer
{
    public function compose(View $view)
    {
        $view->with('colonies', Colony::lists('name', 'id'));
    }
}
