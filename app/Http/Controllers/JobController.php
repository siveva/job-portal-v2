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

    // public function d(){
    //     return view('jobs.post-a-job');
    // }

    public function index()
    {
        $jobs = JobListing::with('employer')->latest()->get();
        return view('welcome', compact('jobs'));
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
    public function show()
{
        $jobId = request()->query('id');
        $job = JobListing::find($jobId);
        return view('jobs.job-single', compact('job'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobListing  $jobListing
     * @return \Illuminate\Http\Response
     */
    public function edit(JobListing $job)
    {
        $categories = Category::all();
         return view('jobs.edit', compact('job','categories'));
        
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobListing  $jobListing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobListing $job)
    {
        // Validate the form data
        // return $job;
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'location' => 'required|max:255',
            'salary' => 'required|numeric',
            'job_type' => 'required',
            'requirements' => 'required',
            'deadline' => 'required|date',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id'
        ]);

        // return $jobListing;
    
        // Update the job listing with the new data
        $job->title = $validatedData['title'];
        $job->description = $validatedData['description'];
        $job->location = $validatedData['location'];
        $job->salary = $validatedData['salary'];
        $job->job_type = $validatedData['job_type'];
        $job->requirements = $validatedData['requirements'];
        $job->deadline = $validatedData['deadline'];
    
        // Get the authenticated user's employer and associate it with the job listing
        // $employer = Auth::user();
        // $jobListing->employer()->associate($employer);
    
        // Save the updated job listing
        $job->save();
    
        // Sync the categories with the provided list
        $job->categories()->sync($validatedData['categories']);
    
        // Redirect to the employer's dashboard with a success message
        return redirect()->route('employer.jobList')->with('success', 'Job updated successfully.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobListing  $jobListing
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobListing $jobListing)
    {
        $jobListing->delete();
        return redirect()->route('employer.jobList')->with('success', 'Job deleted successfully.');

    }
}
