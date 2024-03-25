<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        // Check if the user has any of the required permissions
        foreach ($permissions as $permission) {
            if (!auth()->user()->hasPermissionTo($permission)) {
                abort(403, 'Unauthorized! Sorry you are not allowed to view this page.');
            }
        }

        return $next($request);
    }
}