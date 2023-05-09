<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeekerMiddleware
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
        // if (auth()->check() && auth()->user()->account_type === 'jobseeker') {
        //     return $next($request);
        // }
        // abort(403, 'Unauthorized action.');

        if(Auth::check())
        {

            if(Auth::user()->account_type=='jobseeker')
            {
                return $next($request);
            }
            else
            {
                return redirect('/jobseeker/dashboard')->with('status','Access Denied! As you are not an Employer');

            }

        }
        else{
           
            return redirect('/login')->with('status','Please Login First');

        }

    }
}
