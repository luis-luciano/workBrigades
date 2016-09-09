<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class CustomDirectivesBladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register blade directives
        $this->bladeDirectives();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Register the blade directives
     *
     * @return void
     */
    private function bladeDirectives()
    {
        Blade::directive('role', function($expression) 
        {
            return "<?php if (Auth::check() && Auth::user()->hasRole{$expression}): ?>";
        });

        Blade::directive('endrole', function($expression) 
        {
            return "<?php endif; ?>";
        });
    }
}
