<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param mixed ...$roles
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $roles = empty($roles) ? [null] : $roles;

        foreach ($roles as $role) {
            if(!Auth::guard($role)->check()){
                if ($role == 'admin') {
                    return redirect()->route('admin.getSignIn');
                }
                if ($role == 'customer') {
                    return redirect()->route('customer.getSignIn');
                }
            }
        }

        return $next($request);
    }
}
