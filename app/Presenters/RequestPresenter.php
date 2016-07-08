<?php

namespace App\Presenters;

use App\Request;
use McCool\LaravelAutoPresenter\BasePresenter;

class RequestPresenter extends BasePresenter
{
    public function __construct(Request $resource)
    {
        $this->wrappedObject = $resource;
    }

    public function reduced_subject()
    {
        return str_limit($this->wrappedObject->subject, 28);
    }

}
