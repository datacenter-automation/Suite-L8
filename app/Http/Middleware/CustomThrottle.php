<?php

namespace App\Http\Middleware;

use Illuminate\Routing\Middleware\ThrottleRequests;

class CustomThrottle extends ThrottleRequests
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return string|void
     */
    protected function resolveRequestSignature($request)
    {
        return $request->header('X-API-Key');
    }
}
