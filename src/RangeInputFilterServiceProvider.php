<?php

declare(strict_types = 1);

namespace DigitalCreative\RangeInputFilter;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class RangeInputFilterServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Nova::serving(function (ServingNova $event): void {

            Nova::script('range-input-filter', __DIR__ . '/../dist/js/filter.js');
            Nova::style('range-input-filter', __DIR__ . '/../dist/css/filter.css');

        });
    }
}
