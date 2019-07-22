<?php

namespace App\Http\Middleware;

use Closure;

class AdminVerify
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
        $user = \Auth::user();
        if ($user->is_admin) {
            return $next($request);
        }

        return response()->json([
            'message' => 'Unauthorized user.'
        ], 403);
    }
}
