<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Lang;
use uistacks\Users\Models\Permission;
use uistacks\Users\Models\PermissionRole;
use uistacks\Users\Models\PermissionUser;
use uistacks\Users\Models\PermissionTrans;
use Illuminate\Support\Facades\Request;
//use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;

// Custom uistacks
class AdminMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {


        if (Auth::check()) {
            if (!$request->user()->userRole || $request->user()->userRole->role_id != '1') {
                if ($request->user()->userRole->role_id != '1') {
                    abort('403', 'Unauthorized action.');
                } else if ($request->user()->userRole->role_id == '4') {
                    if ($request->user()->active == 0) {
                        \Session::flush();
                        \Session::flash('alert-class', 'alert-danger');
                        \Session::flash('message', "حسابك غير نشط يرجى الاتصال بالمشرف");                     
                        return redirect(url('/')."/ar/admin/login");
                    }

                    if (Request::segment(3) != NULL) {
                        $all_permission = Auth::user()->hasPermission;
                        foreach ($all_permission as $key => $value) {
                            $arr_user_permission[] = $all_permission{$key}->getPermission->model;
                        }
                        if (isset($all_permission) && count($all_permission) > 0) {
                            if (!in_array(Request::segment(3), $arr_user_permission)) {
                                abort('403', 'Unauthorized action.');
                            }
                        } else {
                            abort('403', 'Unauthorized action.');
                        }
                    }
                }
            }
        } else {
            return redirect(Lang::getLocale() . '/admin/login');
        }
        return $next($request);
    }

}
