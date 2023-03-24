<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    /*
    bbmanager
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


    public function login(LoginRequest $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|same:password',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {

            if (auth()->user()->role == 'bbmanager') {
                if (auth()->user()->isBlocked == 1) {
                    Auth::logout();
                    return
                        redirect()->route('login')
                        ->with('warning', 'User has been blocked please contanct administrator.');
                }
                return redirect()->route('bbmanager.home');
            }
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.home');
            } else if (auth()->user()->role == 'donor') {
                if (auth()->user()->isBlocked == 1) {
                    Auth::logout();
                    return
                        redirect()->route('login')
                        ->with('warning', 'User has been blocked please contanct administrator.');
                }
                return redirect()->route('donor.home');
            }
            if (auth()->user()->role == 'nurse') {
                if (auth()->user()->isBlocked == 1) {
                    Auth::logout();
                    return
                        redirect()->route('login')
                        ->with('warning', 'User has been blocked please contanct administrator.');
                }
                return redirect()->route('nurse.home');
            } else if (auth()->user()->role == 'technitian') {
                if (auth()->user()->isBlocked == 1) {
                    Auth::logout();
                    return
                        redirect()->route('login')
                        ->with('warning', 'User has been blocked please contanct administrator.');
                }
                return redirect()->route('technitian.home');
            }
            if (auth()->user()->role == 'healthinstitute') {
                if (auth()->user()->isBlocked == 1) {
                    Auth::logout();
                    return
                        redirect()->route('login')
                        ->with('warning', 'User has been blocked please contanct administrator.');
                }
                return redirect()->route('healthinstitute.home');
            }
            if (auth()->user()->role == 'encoder') {
                if (auth()->user()->isBlocked == 1) {
                    Auth::logout();
                    return
                        redirect()->route('login')
                        ->with('warning', 'User has been blocked please contanct administrator.');
                }
                return redirect()->route('encoder.home');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address Or Password Are Wrong.');
        }
    }
}
