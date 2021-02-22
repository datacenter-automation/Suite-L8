<?php

namespace App\Http\Middleware;

use Closure;
use Opis\Closure\SecurityException;

class Local
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! in_array(app()->environment(), ['development', 'local'])) {
            return response()->view('errors.security-exception')->withException(new SecurityException(null));
        }

        return $next($request);
    }
}
