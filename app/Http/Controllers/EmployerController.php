<?php

namespace App\Http\Controllers;

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



    public function dashboard()
    {
        $jobs = JobListing::where('employer_id', auth()->user()->employer->id)->paginate(10);
        return view('employers.dashboard', compact('jobs'));
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
