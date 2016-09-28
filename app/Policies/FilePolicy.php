<?php

namespace App\Policies;

use App\File;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy
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

    public function destroy(User $user, File $file)
    {
        if($file->creator instanceof User)
        {
            return $user->id === $file->creator->id;
        }
    }
}
