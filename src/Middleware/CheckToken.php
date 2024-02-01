<?php

namespace Brunocfalcao\Tokenizer\Middleware;

use Brunocfalcao\Tokenizer\Models\Token;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class CheckToken
{
    public function handle(Request $request, Closure $next)
    {
        if (! $request->has('token')) {
            throw new BadRequestException('Unknown Token');
        }

        if (! Token::burn($request->input('token'))) {
            throw new BadRequestException('Invalid Token');
        }

        return $next($request);
    }
}
