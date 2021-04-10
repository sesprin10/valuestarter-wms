<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class State
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
        if (session('token') == null)
            return $next($request);
        return redirect(route('dashboard.index'));
    }
}
