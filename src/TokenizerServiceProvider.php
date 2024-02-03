<?php

namespace Brunocfalcao\Tokenizer;

use Brunocfalcao\Tokenizer\Middleware\WithToken;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class TokenizerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function register()
    {
        Route::aliasMiddleware('withToken', WithToken::class);
    }
}
