<?php

namespace App\Http\ViewComposers;

use App\RequestState;
use App\Supervision;
use Illuminate\Contracts\View\View;

class RequestsIndexComposer
{
    public function compose(View $view)
    {
        $view->with('requestStates', RequestState::get()->pluck('label', 'id'));
        //$view->with('supervisions', Supervision::get()->pluck('name', 'id'));
    }
}
