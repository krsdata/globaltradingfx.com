<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
     public function handle(Request $request, Closure $next, $guard = null)
    {   
        if (Auth::guard($guard)->check()) {
            $role_id = Auth::user()->role_id; 
            switch ($role_id) {
              case Role::ADMIN:
                return redirect()->route('dashboard');
              break;

              case Role::STAFF:
                return redirect()->route('dashboard');
              break;
            }
        }
        return $next($request);
    }
}
