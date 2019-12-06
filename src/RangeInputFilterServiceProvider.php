<?php

namespace DigitalCreative\RangeInputFilter;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class RangeInputFilterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('range-input-filter', __DIR__ . '/../dist/js/filter.js');
        });
    }
}
