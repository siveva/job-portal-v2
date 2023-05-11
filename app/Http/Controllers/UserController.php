<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{



    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function doRegister(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'account_type' => 'required|in:employer,job_seeker',
        ]);

        // Create the user account
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'account_type' => $request->input('account_type'),
        ]);
        $user->save();

        // Redirect the user to their respective dashboard
        if ($user->account_type == 'employer') {
            return redirect()->route('employer.dashboard');
        } else {
            return redirect()->route('jobseeker.dashboard');
        }
    }

    public function doLogin(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Redirect the user to their respective dashboard
            if (Auth::user()->account_type == 'employer') {
                return redirect()->route('employer.dashboard');
            } else {
                return redirect()->route('jobseeker.dashboard');
            }
        } else {
            // Failed authentication, redirect back with error message
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }



    public function updateProfile(Request $request, $id)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->save();

        return response()->json(['message' => 'Profile updated successfully']);
    }

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
            

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
