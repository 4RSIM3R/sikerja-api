<?php

namespace App\Http\Middleware;

use App\Utils\WebResponseUtils;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::user()->hasRole($role)) {
            return WebResponseUtils::base(["message" => "You have permission to access this page."], status: 403);
        } else {
            return $next($request);
        }
    }
}
