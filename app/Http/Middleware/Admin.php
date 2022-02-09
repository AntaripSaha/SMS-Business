<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Supprt\Facades\Auth;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin == 1) {
            return $next($request);
        }
        return redirect()->route('home')->with('error', 'You are not Authorized');
    }
}
