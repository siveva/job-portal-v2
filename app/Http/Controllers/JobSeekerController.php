<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function dashboard()
    {
        return view('jobseekers.dashboard');
    }
    

    public function index()
    {
        $jobs = JobListing::with('employer')->latest()->get();
        return view('jobseekers.want-a-job', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = auth()->user();
        // if ($user->job_seeker) {
        //     return redirect()->route('jobseeker.dashboard');
        // }
        // return view('jobseeker.fill-up');

        return view('jobseekers.fill-up');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string'],
            'resume' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
        ]);
    
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resumeName = $resume->getClientOriginalName();
            $resumeExtension = $resume->getClientOriginalExtension();
            $newResumeName = 'resume_' . time() . '.' . $resumeExtension;
    
            $resume->move(public_path('uploads/resumes'), $newResumeName);
            $resumePath = 'uploads/resumes/' . $newResumeName;
        } else {
            $resumePath = null;
        }
    
        $jobSeeker = new JobSeeker([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone_number' => $validatedData['phone_number'],
            'address' => $validatedData['address'],
            'resume' => $resumePath,
        ]);
    
        $user->jobSeeker()->save($jobSeeker);
    
        return redirect()->route('jobseeker.dashboard');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobSeeker  $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function show(JobSeeker $jobSeeker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobSeeker  $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function edit(JobSeeker $jobSeeker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobSeeker  $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobSeeker $jobSeeker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobSeeker  $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobSeeker $jobSeeker)
    {
        //
    }
}
