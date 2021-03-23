<?php

namespace App\Http\Middleware;

use Closure;

class BookingsMiddleware
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
      // Force Json accept type
      if (! Str::contains($request->header('accept'), ['/json', '+json'])) {
        $request->headers->set('accept', 'application/json,' . $request->header('accept'));
    }
    // else {
    //     dd('Use JSON format for sending requests.')
    // }

    return $next($request);
}
    }

