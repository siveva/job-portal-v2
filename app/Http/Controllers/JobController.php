<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('jobs.post-a-job');
        
    // }

    public function create()
    {
        // return view('job_listings.post-a-job');
        
        $categories = Category::all();
        return view('jobs.create', compact('categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'location' => 'required|max:255',
            'salary' => 'required|numeric',
            'job_type' => 'required',
            'requirements' => 'required',
            'deadline' => 'required|date',
            'categories' => 'required|array|min:1', // added categories validation rules
            'categories.*' => 'exists:categories,id' // added categories validation rules
        ]);
    
        // Create a new Job instance and fill it with the form data
        $job = new JobListing();
        $job->title = $validatedData['title'];
        $job->description = $validatedData['description'];
        $job->location = $validatedData['location'];
        $job->salary = $validatedData['salary'];
        $job->job_type = $validatedData['job_type'];
        $job->requirements = $validatedData['requirements'];
        $job->deadline = $validatedData['deadline'];
    
        // Get the authenticated employer and associate the job with them
        // $employer = Auth::user()->employer;
        // $employer->jobListings()->save($job);

        $user = Auth::user();
        $user->jobListings()->save($job);
    
        // Attach the selected categories to the job
        $job->categories()->attach($validatedData['categories']);
    
        // Redirect to the employer's dashboard with a success message
        return redirect()->route('employer.jobList')->with('success', 'Job posted successfully.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobListing  $jobListing
     * @return \Illuminate\Http\Response
     */
    public function show(JobListing $jobListing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobListing  $jobListing
     * @return \Illuminate\Http\Response
     */
    public function edit(JobListing $jobListing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobListing  $jobListing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobListing $jobListing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobListing  $jobListing
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobListing $jobListing)
    {
        //
    }
}
