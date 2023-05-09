<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        $user = auth()->user();

        switch ($user->account_type) {
            case 'admin':
                return route('admin.dashboard');
            case 'employer':
                if (!$user->employer) {
                    return route('employer.fill-up');
                }
                return route('employer.dashboard');
            case 'jobseeker':
                if (!$user->jobSeeker) {
                    return route('jobseeker.fill-up');
                }
                return route('jobseeker.dashboard');
            default:
                return route('/');
        }
    }


}
