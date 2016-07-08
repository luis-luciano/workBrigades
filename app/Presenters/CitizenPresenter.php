<?php

namespace App\Presenters;

use App\Citizen;
use McCool\LaravelAutoPresenter\BasePresenter;

class CitizenPresenter extends BasePresenter
{
    public function __construct(Citizen $resource)
    {
        $this->wrappedObject = $resource;
    }

    public function count()
    {
        return $this->wrappedObject->count();
    }

    public function colony()
    {
        return (is_null($this->wrappedObject->personalInformation->colony)) ? '' : $this->wrappedObject->personalInformation->colony->name_with_zip;
    }
}
