<?php

namespace App\Http\Middleware;

use Closure;

class BasicAuth
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
        //Crude but effective TODO: do it properly
        if ($request->getUser() != 'candidate1' && $request->getPassword() != 'iptelJobOffer789!') {
            return response()->json(['error' => 'Basic auth failed'], 500);
        }

        return $next($request);
    }
}
