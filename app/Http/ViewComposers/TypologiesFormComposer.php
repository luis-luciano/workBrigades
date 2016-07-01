<?php

namespace App\Http\ViewComposers;

use App\Supervision;
use Illuminate\Contracts\View\View;

class TypologiesFormComposer
{
    public function compose(View $view)
    {
        $view->with('supervisions', Supervision::lists('name', 'id'));
    }
}
