<?php

namespace App\Http\Middleware;

use Closure;
use App\ApiKey;

class ApiKeyAuth
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
        $apiKey = $request->header('x-api-key');

        if (!$apiKey) {
            return response()->json(['error' => 'Api key not found'], 400);
        }

        if (!ApiKey::where('key', $apiKey)->first()) {
            return response()->json(['error' => 'Api key not valid'], 400);
        }

        return $next($request);
    }
}
