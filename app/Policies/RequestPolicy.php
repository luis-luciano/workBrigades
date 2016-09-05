<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Request as Inquiry;
use App\User;

class RequestPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function creator(User $user,Inquiry $inquiry)
    {
        return $user->id === $inquiry->creator_id;
    }
}
