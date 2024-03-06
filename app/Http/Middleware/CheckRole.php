<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!$request->user()->hasRole($role)) {
            return redirect()->back()->withErrors('You are not authorized to access this resource.');
        }
        return $next($request);
    }
}
