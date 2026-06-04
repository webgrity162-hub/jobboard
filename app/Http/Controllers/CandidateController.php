<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Services\ApplicationService;
use App\Services\AuthService;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    protected ApplicationService $applicationService;
    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }
    public function index(Request $req){
        $applications = $this->applicationService->getApplicationsByUserId($req->user()->id);
        // dd($applications);
        return view('candidate.dashboard',compact('applications'));
    }

    public function profileInfo(){
        $user = auth()->user();
        return view('candidate.settings',compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request, AuthService $authService){
        $request = $request->validated();
        
        $user = auth()->user();
        $authService->updateProfile($user,$request);
        return redirect()->route('candidate.settings')->with('success', 'Profile updated successfully');

    }

    public function updatePassword(Request $req, AuthService $authService){
        $validated = $req->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!$authService->updatePassword($req->user(), $validated)) {
            return redirect()->back()
                ->withErrors(['current_password' => 'The provided password does not match our records.'])
                ->with('error', 'Password update failed');
        }

        return redirect()->route('candidate.settings')->with('success', 'Password updated successfully');
    }

    public function apply(Request $request, $jobId)
    {
        $data = [
            'user_id' => auth()->id(),
            'company_job_id' => intval($jobId),
            'cover_letter' => $request->input('cover_letter'),
            'resume' => $request->file('resume') ? $request->file('resume')->store('resumes', 'public') : null,
            'status' => 'pending',
        ];

        $result = $this->applicationService->store($data);

        if ($result['success']) {
            return redirect()->back()->with('success', $result['message']);
        }

        return redirect()->back()->with('error', $result['message']);
    }

    public function downloadResume($filename){
        $path = storage_path('app/public/' . $filename);
        if(!file_exists($path)){
            return redirect()->back()->with('error', 'File not found');
        }
        return response()->download($path);
    }
}
