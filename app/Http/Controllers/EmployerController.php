<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Employer;
use App\Models\JobListing;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function jobList()
     {
        //  $employer = auth()->user()->employer;
         $employer = auth()->user();
         if ($employer) {
            //  $jobs = JobListing::where('employer_id', $employer->id)->paginate(10);
            $jobs = JobListing::withCount('applications')->where('employer_id', $employer->id)->latest()->paginate(10);
         } else {
             $jobs = collect();
         }
         return view('employers.job-list', compact('jobs'));
     }
     

    public function dashboard()
    {
        $employer = auth()->user();
        $jobCount = JobListing::where('employer_id',$employer->id)->count();

        // Get the count of applicants
        $applicantCount = Application::whereIn('job_listing_id', function ($query) use ($employer) {
            $query->select('id')->from('job_listings')->where('employer_id', $employer->id);
        })->count();
        
        return view('employers.dashboard',compact('jobCount','applicantCount'));
    }
    

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employers.fill-up');
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
            'company_name' => ['required', 'string', 'max:255'],
            'company_description' => ['required', 'string'],
            'company_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($request->hasFile('company_logo')) {
            $image = $request->file('company_logo');
            $imageName = $image->getClientOriginalName();
            $imageExtension = $image->getClientOriginalExtension();
            $newImageName = 'company_logo_' . time() . '.' . $imageExtension;

            $image->move(public_path('uploads/company_logos'), $newImageName);
            $imagePath = 'uploads/company_logos/' . $newImageName;
        } else {
            $imagePath = null;
        }

        $employer = new Employer([
            'company_name' => $validatedData['company_name'],
            'company_description' => $validatedData['company_description'],
            'company_logo' => $imagePath,
        ]);

        $user->employer()->save($employer);

        return redirect()->route('employer.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $employer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit(Employer $employer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employer $employer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employer $employer)
    {
        //
    }
}
