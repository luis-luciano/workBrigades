<?php

namespace App\Presenters;

use App\Typology;
use McCool\LaravelAutoPresenter\BasePresenter;

class TypologyPresenter extends BasePresenter
{
    public function __construct(Typology $resource)
    {
        $this->wrappedObject = $resource;
    }

    public function count()
    {
        return $this->wrappedObject->count();
    }

    public function supervisions()
    {
        return $this->wrappedObject->supervisions->implode('name', ', ');
    }

}
