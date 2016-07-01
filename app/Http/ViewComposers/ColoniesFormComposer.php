<?php

namespace App\Http\ViewComposers;

use App\ColonyScope;
use App\SettlementType;
use Illuminate\Contracts\View\View;

class ColoniesFormComposer
{
    public function compose(View $view)
    {
        $view->with('scopes', ColonyScope::lists('name', 'id'));
        $view->with('settlementTypes', SettlementType::lists('name', 'id'));
    }
}
