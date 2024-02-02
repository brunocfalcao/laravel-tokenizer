<?php

namespace Brunocfalcao\Tokenizer\Middleware;

use Brunocfalcao\Tokenizer\Models\Token;
use Closure;
use Illuminate\Http\Request;

class WithToken
{
    public function handle(Request $request, Closure $next)
    {
        if (! $request->has('token')) {
            throw new \Exception('Token invalid, detected by middleware');
        }

        if (! Token::isValid($request->input('token'))) {
            throw new \Exception('Token invalid, detected by middleware');
        }

        return $next($request);
    }
}
