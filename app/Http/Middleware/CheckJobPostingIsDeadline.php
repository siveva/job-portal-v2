<?php

namespace App\Http\Middleware;

use App\Models\JobListing;
use Closure;
use Illuminate\Http\Request;

class CheckJobPostingIsDeadline
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
        $job = JobListing::find($request->id);
        if ($job->deadline->isToday() || $job->deadline->isPast()) {
            return response()->view('messages.job-deadline', ['job' => $job]);
        }
        return $next($request);
    }
}
