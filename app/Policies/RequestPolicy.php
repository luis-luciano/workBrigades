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

    public function displayRequest(User $user,Inquiry $inquiry)
    {
        $userSupervisions=$user->supervisions_id;
        $inquirySupervisions=$inquiry->supervisions->pluck('id')->toArray();
        return !!(array_intersect($userSupervisions, $inquirySupervisions)||$user->hasRole('administrator|supervisor'));
    }

    public function creator(User $user,Inquiry $inquiry)
    {
        return $user->id === $inquiry->creator_id;
    }
}
