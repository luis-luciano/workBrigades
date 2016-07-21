<?php

namespace Slc\Js;

use Illuminate\Support\ServiceProvider;

class JsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfigGenerator();
        $this->registerInitGenerator();
        $this->registerControllerGenerator();
        $this->registerAutloadGenerator();
        $this->registerHelperGenerator();
        $this->registerListenerGenerator();
        $this->registerValidatorGenerator();
    }

    /**
     * Register the js:make:config generator.
     */
    private function registerConfigGenerator()
    {
        $this->app->singleton('command.slc.config', function ($app) {
            return $app[Commands\ConfigMakeCommand::class];
        });

        $this->commands('command.slc.config');
    }

    /**
     * Register the js:init generator.
     */
    private function registerInitGenerator()
    {
        $this->app->singleton('command.slc.init', function ($app) {
            return $app[Commands\InitCommand::class];
        });

        $this->commands('command.slc.init');
    }

    /**
     * Register the js:make:controller generator.
     */
    private function registerControllerGenerator()
    {
        $this->app->singleton('command.slc.controller', function ($app) {
            return $app[Commands\ControllerMakeCommand::class];
        });

        $this->commands('command.slc.controller');
    }

    /**
     * Register the js:dumpautoload generator.
     */
    private function registerAutloadGenerator()
    {
        $this->app->singleton('command.slc.dumpautoload', function ($app) {
            return $app[Commands\DumpAutoloadCommand::class];
        });

        $this->commands('command.slc.dumpautoload');
    }

    /**
     * Register the js:make:helper generator.
     */
    private function registerHelperGenerator()
    {
        $this->app->singleton('command.slc.helper', function ($app) {
            return $app[Commands\HelperMakeCommand::class];
        });

        $this->commands('command.slc.helper');
    }

    /**
     * Register the js:make:helper generator.
     */
    private function registerListenerGenerator()
    {
        $this->app->singleton('command.slc.listener', function ($app) {
            return $app[Commands\ListenerMakeCommand::class];
        });

        $this->commands('command.slc.listener');
    }

    /**
     * Register the js:make:validator generator.
     */
    private function registerValidatorGenerator()
    {
        $this->app->singleton('command.slc.validator', function ($app) {
            return $app[Commands\ValidatorMakeCommand::class];
        });

        $this->commands('command.slc.validator');
    }
}
