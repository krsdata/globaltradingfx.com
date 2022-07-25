<?php

namespace App\Http\Middleware;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Closure;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (empty($request->header('Authorization'))){
            return response()->json(['status'=> 401,'message' => 'Authorization token is required']);
        }

        $login_token = $request->header('Authorization');
        $user = User::where('login_token', $login_token)->first();
        
        if($user){
            $request->merge(array('user' => $user->toArray()));
            return $next($request);    
        }else{
            return response()->json(['status'=> 401,'message' => 'Unauthorized Token']);
           }

        }
}
