<?php

namespace App\Presenters;

use App\Brigade;
use McCool\LaravelAutoPresenter\BasePresenter;

class BrigadePresenter extends BasePresenter
{
    public function __construct(Brigade $resource)
    {
        $this->wrappedObject = $resource;
    }

    public function count()
    {
        return $this->wrappedObject->count();
    }

    public function typologies()
    {
        return $this->wrappedObject->typologies->implode('name', ', ');
    }

}
