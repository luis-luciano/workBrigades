<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\View;
use App\ReplyType;

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
        $this->composeRequestsIndex();
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

        view()->composer('admin.requests.edit', function (View $view) {
            $view->with('replyTypes', ReplyType::pluck('label', 'id'));
        });
    }

    private function composeRequestsIndex()
    {
        view()->composer('admin.requests.index', 'App\Http\ViewComposers\RequestsIndexComposer');
    }
}