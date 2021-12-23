<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isGuest
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
        if ($request->user()->role == 'guest') {
            return $next($request);
        }
        return back()->with('error', 'Opps, You\'dont have access to this page');
    }
}
