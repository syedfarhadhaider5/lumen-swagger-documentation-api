<?php

namespace App\Http\Middleware;

use Closure;

class DealershipAdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->attributes->get('user_type') !== 'DEALERSHIP_ADMIN') {
            return response()->json(['error' => 'your request was made with an invalid credentials'], 401);
        }
        return $next($request);
    }
}
