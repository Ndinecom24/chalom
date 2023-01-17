<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActiveUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user() ;
        if( $user->status_id == config('constants.status.deactivated')){
            //log you out
            Auth::logout();
            //return to login
            return redirect(RouteServiceProvider::LOGIN )->with('error', 'Sorry this user is deactivated, please contact system admin' );;
        }elseif( $user->status_id == config('constants.status.deactivated')){
            //log you out
            Auth::logout();
            //return to login
            return redirect(RouteServiceProvider::LOGIN )->with('error', 'Sorry this user is deactivated, please contact system admin' );;
        }else{
            return $next($request);
        }
    }
}
