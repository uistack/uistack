<?php

namespace App\Http\Middleware;

use Closure;
//use Illuminate\Support\Facades\Auth;
use Auth;
use Lang;
use uistacks\Users\Models\Permission;
use uistacks\Users\Models\PermissionRole;
use uistacks\Users\Models\PermissionUser;
use uistacks\Users\Models\PermissionTrans;
use Illuminate\Support\Facades\Request;
//use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
//                return redirect()->guest('login');
                return redirect()->guest(Lang::getLocale() . '/login');
            }
        }

        return $next($request);
    }
}
