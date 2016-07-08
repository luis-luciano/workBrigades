<?php

namespace App\Presenters;

use App\User;
use McCool\LaravelAutoPresenter\BasePresenter;

class UserPresenter extends BasePresenter
{
    public function __construct(User $resource)
    {
        $this->wrappedObject = $resource;
    }

    public function count()
    {
        return $this->wrappedObject->count();
    }

    public function supervisions_in_charge()
    {
        return $this->wrappedObject->supervisionsInCharge->implode('name', ', ');
    }

    public function belongs_to_supervisions()
    {
        return $this->wrappedObject->belongsToSupervisions->implode('name', ', ');
    }

    public function is_active()
    {
        return $this->wrappedObject->is_active ? 'Activo' : 'Inactivo';
    }

}
