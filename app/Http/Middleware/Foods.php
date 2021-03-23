<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class Foods
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! Str::contains($request->header('accept'), ['/json', '+json'])) {
            $request->headers->set('accept', 'application/json,' . $request->header('accept'));
        }
        return $next($request);
    }
}
