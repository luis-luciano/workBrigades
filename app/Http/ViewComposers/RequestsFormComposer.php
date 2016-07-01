<?php

namespace App\Http\ViewComposers;

use App\CaptureType;
use App\Colony;
use App\RequestPriority;
use App\RequestType;
use App\Typology;
use Illuminate\Contracts\View\View;

class RequestsFormComposer
{
    public function compose(View $view)
    {
        $view->with('colonies', Colony::get()->lists('name_with_zip', 'id'));
        $view->with('requestTypes', RequestType::lists('name', 'id'));
        $view->with('captureTypes', CaptureType::lists('name', 'id'));
        $view->with('requestPriorities', RequestPriority::lists('name', 'id'));
        $view->with('tipologies', Typology::lists('name', 'id'));
    }
}
