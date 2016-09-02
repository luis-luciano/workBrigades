<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    /**
     * Set the current user.
     *
     * Corresponds to driver name in authentication configuration.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable|null
     */
    protected $currentUser;
    protected $signedIn;

    public function __construct()
    {
        // for development purpose we are going to use the first user, later we need to use the authentiacted user.
        $this->currentUser = auth()->user();
        //auth()->logout();
        //auth()->login($this->currentUser);
        $this->signedIn = auth()->check();
        view()->share('signedIn', $this->signedIn);
        view()->share('currentUser', $this->currentUser);
    }
}
