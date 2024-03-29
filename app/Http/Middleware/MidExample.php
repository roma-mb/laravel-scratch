<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MidExample
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
        if (now()->format('s') % 2) {
            return $next($request);
        }

        return response('not allowed');
    }
}
