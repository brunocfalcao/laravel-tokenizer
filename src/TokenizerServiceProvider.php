<?php

namespace Brunocfalcao\Tokenizer;

use Illuminate\Support\ServiceProvider;

class TokenizerServiceProvider extends ServiceProvider
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
