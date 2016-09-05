<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Request as Inquiry;
use App\User;
use Supervision;

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

    public function edit(Supervision $supervision,Inquiry $inquiry)
    {
        $supervisionsInvolved=$inquiry->supervisions->lists('id')->toArray();
        return in_array($supervision->id,$supervisionsInvolved);
    }

    public function creator(User $user,Inquiry $inquiry)
    {
        return $user->id === $inquiry->creator_id;
    }
}
