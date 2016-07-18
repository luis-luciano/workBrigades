<?php

namespace App\Presenters;

use App\Sector;
use McCool\LaravelAutoPresenter\BasePresenter;

class SectorPresenter extends BasePresenter
{
    public function __construct(Sector $resource)
    {
        $this->wrappedObject = $resource;
    }

    public function count()
    {
        return $this->wrappedObject->count();
    }

    public function sectors()
    {
        return $this->wrappedObject->sectors->implode('name', ', ');
    }

}
