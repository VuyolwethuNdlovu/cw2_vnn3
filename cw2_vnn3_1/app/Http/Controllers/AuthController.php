<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function index()
    {
        return view('auth.signin');
    }


    public function createSignin(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'password' => 'required',
        ]);
        $credentials = [
            'user_id'=>$request->input('user_id'),
            'password'=>$request->input('password')];

        $verifyPassword = $this->authService->authenticateLoginPassword($credentials);

        if ($verifyPassword == true) {
            // Authentication passed...
            $user = $this->authService->getUserByUserId($credentials['user_id']);
            auth()->login($user);

            if(Auth::user()->role == 'officer'){
                return redirect('/officer/dashboard');
            }
            return redirect('/resident/dashboard');

        } else{
            return back()->withErrors([
                'user_id' => 'The provided credentials did not match our records, please try again.',
                ]);
        }

    }

    public function signup()
    {
        return view('auth.signup');
    }


    public function createUser(Request $request)
    {
        $validator = $request->validate([
            'user_id' => 'required|email|unique:users',
            'name' => 'required',
            'dob'=>'required|date|before:'.Carbon::now()->subYears(16),
            'ni_number'=>'required|size:8|unique:users',
            'address' => 'required',
            'password' => 'required',
        ]);
        $user= $this->authService->createUser($validator);
        auth()->login($user);
        if(Auth::user()->role == 'officer'){
            return redirect('/officer/dashboard');
        }
        return redirect('/resident/dashboard');
    }

//    public function dashboardView()
//    {
//        if(Auth::check()){
//            return view('auth.dashboard');
//        }
//        return redirect("login");
//    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
