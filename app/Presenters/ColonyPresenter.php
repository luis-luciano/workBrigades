<?php

namespace App\Presenters;

use App\Colony;
use McCool\LaravelAutoPresenter\BasePresenter;

class ColonyPresenter extends BasePresenter
{
    public function __construct(Colony $resource)
    {
        $this->wrappedObject = $resource;
    }

    public function count()
    {
        return $this->wrappedObject->count();
    }

    public function scope()
    {
        return $this->wrappedObject->scope->label;
    }

    public function settlement_type()
    {
        return $this->wrappedObject->settlementType->label;
    }
}
