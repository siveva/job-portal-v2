<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Employer;
use App\Models\JobListing;
use App\Models\JobSeeker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function changePassword(Request $request, $id)
    {
        $user = Auth::user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return response()->json(['error' => 'Current password is incorrect'], 400);
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return response()->json(['message' => 'Password changed successfully']);
    }

    public function updateProfile(Request $request, $id)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->save();

        return response()->json(['message' => 'Profile updated successfully']);
    }

   
            

    public function dashboard()
    {
        $jobCount=JobListing::count();
        $employerCount=User::where('account_type','employer')->count();
        $seekerCount=User::where('account_type','jobseeker')->count();
        $categoryCount=Category::count();
        return view('admins.dashboard',compact('jobCount','employerCount','seekerCount','categoryCount'));
    }
}
