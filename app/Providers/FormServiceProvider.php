<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::macro('multipleSelectPicker', function ($name, $list = [], $selected = null, $options = []) {
            $selectPickerOptions = [
                'class' => 'selectpicker form-control',
                'data-live-search' => 'true',
                'data-actions-box' => 'true',
                'data-selected-text-format' => 'count>2',
                'multiple',
            ];

            $options = array_merge($selectPickerOptions, $options);

            return Form::select($name, $list, $selected, $options);
        });
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
}
