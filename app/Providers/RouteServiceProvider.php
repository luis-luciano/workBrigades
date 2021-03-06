<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        $router->model('citizens','App\Citizen');
        $router->model('requests', 'App\Request');
        $router->model('colonies','App\Colony');
        $router->model('files','App\File');
        $router->model('users', 'App\User');
        $router->model('scopes','App\ColonyScope');
        $router->model('settlement-types','App\SettlementType');
        $router->model('sectors','App\Sector');
        $router->model('requestsStates','App\RequestState');
        $router->model('requestsPriorities','App\RequestPriority');
        $router->model('typologies','App\Typology');
        $router->model('captureTypes','App\CaptureType');
        $router->model('requestTypes','App\RequestType');
        $router->model('problemTypes','App\Problem');
        $router->model('brigades','App\Brigade');
        $router->model('supervisions','App\Supervision');
        $router->model('roles','App\Role');
        $router->model('permissions','App\Permission');

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);
    }

    protected function mapWebRoutes(Router $router)
    {
        $router->group(['namespace'=>$this->namespace,'middleware'=>'web'],function($router){
            require app_path('Http/routes.php');
        });
    }
}
