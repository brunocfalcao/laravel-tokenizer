<?php

namespace Brunocfalcao\Defaultables;

use Illuminate\Support\ServiceProvider;

class DefaultablesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function register()
    {
        //
    }
}
