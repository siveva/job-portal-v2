<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function landingPage()
    {
        $recentJobs = JobListing::with('employer')->latest()->paginate(5)->fragment('recentJobs');
        return view('welcome', compact('recentJobs'));
    }

    public function searchJobs(Request $request)
    {
        $jobs = JobListing::with('employer')->when($request->jobTitle, function ($query, $jobTitle) {
            return $query->where('title', 'LIKE', '%'.$jobTitle.'%');
        })->when($request->jobType, function ($query, $jobType) {
            return $query->where('job_type', $jobType);
        })
        ->when($request->category, function ($query, $category) {
            return $query->whereHas('categories', function ($subquery) use ($category) {
                $subquery->where('name', 'LIKE', '%'.$category.'%');
            });
        })->when($request->location, function ($query, $location) {
            return $query->where('location', 'LIKE', '%'.$location.'%');
        });

        $jobResults = $jobs->latest()->paginate(10)->appends($request->only(['jobTitle', 'jobType', 'location']));
        $recentJobs = JobListing::with('employer')->latest()->paginate(5)->fragment('recentJobs');

        return view('search-result', compact('jobResults', 'recentJobs'))->with(['jobTitle' => $request->jobTitle, 'jobType' => $request->jobType, 'location' => $request->location]);
    }
}
