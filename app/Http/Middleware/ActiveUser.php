<?php

namespace App\Http\Middleware;

use Closure;

class ActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if ($user->blocked_at) {
            auth()->logout();

            $request->session()->flash('blocked_at', "Account was blocked {$user->blocked_at->diffForHumans()}");

            return redirect()->route('login');
        }

        return $next($request);
    }
}
