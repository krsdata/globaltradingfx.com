<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {   
        $user = Auth::user();
        if ($user->role_id == $role) {
             return $next($request);
        }else{
            if ($user->role_id == 2) {
                return redirect()->route('dashboard');
            }elseif($user->role_id == 3){
                return redirect()->route('dashboard');
            }
        }

        return redirect('/')->with('error','You have not admin access');
    }
}
