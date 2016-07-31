<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeCitizensForm();
        $this->composeTypologiesForm();
        $this->composeRequestsForm();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composeCitizensForm()
    {
        view()->composer(['admin.citizens.form','admin.requests.form'], 'App\Http\ViewComposers\CitizensFormComposer');
    }

    private function composeTypologiesForm()
    {
        view()->composer('admin.typologies.form', 'App\Http\ViewComposers\TypologiesFormComposer');
    }

    private function composeRequestsForm()
    {
        view()->composer('admin.requests.form', 'App\Http\ViewComposers\RequestsFormComposer');
    }
}