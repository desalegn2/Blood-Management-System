<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Node\Query\OrExpr;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // if (Auth::guard($guard)->check()) {
            //     return redirect(RouteServiceProvider::HOME);
            // }

            if ($guard == 'admin' && Auth::guard($guard)->check()) {
                return redirect()->route('admin.home');
            } else if ($guard == 'donor' && Auth::guard($guard)->check()) {
                return redirect()->route('donor.home');
            } else if ($guard == 'nurse' && Auth::guard($guard)->check()) {
                return redirect()->route('nurse.home');
            } else if ($guard == 'technitian' && Auth::guard($guard)->check()) {
                return redirect()->route('technitian.home');
            } else if ($guard == 'healthinstitute' && Auth::guard($guard)->check()) {
                return redirect()->route('healthinstitute.home');
            }
            return $next($request);
        }
        // OR
        // if (Auth::guard($guard)->check()) {

        //     if (Auth::user()->type == 'admin') {
        //         return redirect()->route('admin.home');
        //     }
        //     if (Auth::user()->type == 'donor') {
        //         return redirect()->route('donor.home');
        //     }
        //     if (Auth::user()->type == 'nurse') {
        //         return redirect()->route('nurse.home');
        //     }
        //     if (Auth::user()->type == 'technitian') {
        //         return redirect()->route('technitian.home');
        //     }
        //     if (Auth::user()->type == 'healthinstitute') {
        //         return redirect()->route('healthinstitute.home');
        //     }
        // }
        // return $next($request);
    }
}
