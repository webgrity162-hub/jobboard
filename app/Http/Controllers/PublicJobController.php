<?php

namespace App\Http\Controllers;

use App\Services\JobService;
use Illuminate\Http\Request;

class PublicJobController extends Controller
{
    protected JobService $jobService;
    public function __construct(JobService $jobService){
        $this->jobService = $jobService;
    }

    public function home(){
        
        $jobs = $this->jobService->getAll(['item' => 3]);
        return view('welcome',compact('jobs'));
        
    }
    public function index(Request $request){
        $jobs = $this->jobService->getAll($request->all());
        $jobs->withQueryString();
        // dd($jobs);
        return  view('jobs.index', compact('jobs'));
    }
    public function show($slug){
        $job = $this->jobService->getBySlug($slug);
        // dd($job);
        return view('jobs.show',compact('job'));

    }
}
