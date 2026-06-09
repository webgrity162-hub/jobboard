<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanySetupRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected AuthService $authService ;
    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }


    public function register(UserRegistrationRequest $request){
        $data = $request->validated();
        $data['avatar'] = $request->file('avatar');
        $user = $this->authService->register($data);
        if($user->role == 'employer'){
            return redirect()->route('employer.setup-company');
        }
        return redirect()->route('login')->with('success','Registration successful you can now login');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if ($this->authService->login($validated)) {
            $user = auth()->user();
            if ($user->role == 'employer') {
                return redirect()->route('employer.dashboard')->with('success', 'Login successful');
            }
            return redirect()->route('candidate.dashboard')->with('success', 'Login successful');
        }

        return redirect()->back()->withInput($request->only('email'))->with('error', 'Invalid credentials');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

    public function setupCompany(CompanySetupRequest $request){
        $company = $request->validated();
        $company['logo'] = $request->file('logo');
        $company = $this->authService->setupCompany($company);
        if($company){
            return redirect()->route('employer.dashboard')->with('success','Company setup successful');
        }
        return redirect()->back()->with('error','Company setup failed');


    }

    public function dashboard(){
        if(auth()->user()->role=='employer'){
            return redirect()->route('employer.dashboard');
        }
        return redirect()->route('candidate.dashboard');
    }

    public function updateCompanyProfile(Request $req){
        dd($req->all());
    }
    
}
