<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Interfaces\JobApplicationServiceInterface;
use App\Models\Application;
use App\Models\JobListing;
use App\Models\User as Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class JobApplicationController extends Controller
{
    private $jobApplicationService;

    public function __construct(JobApplicationServiceInterface $jobApplicationService)
    {
        $this->jobApplicationService = $jobApplicationService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $job = JobListing::find($request->id);
        $jobApplications = Application::with(['jobSeeker.jobSeeker', 'jobListing'])->where('job_listing_id', $job->id)->get();

        return view('employers.jobs.applicants.index', compact('job', 'jobApplications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::with(['jobSeeker.jobSeeker', 'jobListing'])->find($id);
        return view('employers.jobs.applicants.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->jobApplicationService->updateApplicationStatus($id, $request->type);
        $application = $result['application'];
        $statusMessage = $result['statusMessage'];
        
        return Redirect::route('applications.index', ['id' => $application->job_listing_id])
            ->with('success', $statusMessage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function downloadResume($id)
    {
        $application = Application::find($id);
        $path = storage_path('app/' . $application->resume);
        $fileExtension = pathinfo($path, PATHINFO_EXTENSION);
        $newFileName = Str::slug($application->jobSeeker->name . '-' . $application->jobListing->title, '-') . '-resume.' . $fileExtension;

        return response()->download($path, $newFileName);
    }
}
