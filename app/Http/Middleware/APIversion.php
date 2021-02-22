<?php

namespace App\Http\Middleware;

use Closure;

class APIversion
{
    /**
     * Handle an incoming request.
     *
     * @param          $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $version = config('app.api_version');

        $response = $next($request);

        $response->headers->set('Accept-version', $version);
        $response->headers->set('Accept', "application/vnd.dcas.v{$version}+json");

        return $response;
    }
}
