<?php

/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 18/07/2023
 * Time: 20:28
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View as FacadesView;

class AuthLogin
{
    public function handle(Request $request, Closure $next)
    {
        $current_route = $request->route()->getName();
        if (strpos($current_route, 'create') !== false) {
            $parent_route = str_replace('create', 'index', $current_route);
            $method = 'create';
        } elseif (strpos($current_route, 'edit') !== false) {
            $parent_route = str_replace('edit', 'index', $current_route);
            $method = 'edit';
        } else {
            $parent_route = null;
            $method = 'index';
        }

        if (!is_null(Auth::user())) {
            if (Auth::user()->is_root == false && $current_route != 'admin.dashboard.index' && $current_route != 'admin.403' && $current_route != 'auth.get.logout') {
                $permissions = DB::table('role')->where('id', Auth::user()->role_id)->first();
                if ($permissions) {
                    if (str_contains($permissions->permissions, $current_route) !== true) {
                        abort(403, 'Bạn không có quyền truy cập chức năng này');
                    }
                } else {
                    abort(403, 'Bạn không có quyền truy cập chức năng này');
                }
            }
            if ($parent_route == null) {
                $parent_route = $current_route;
            }

            FacadesView::share(['current_route' => $current_route, 'parent_route' => $parent_route, 'method' => $method]);
            return $next($request);
        } else {
            return redirect()->route('auth.get.login');
        }
    }
}
