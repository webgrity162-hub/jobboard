@extends('layouts.candidate')

@section('title', 'Job Details | JobConnect')

@section('candidate-content')
    <div class="space-y-6">
        <!-- Back Button -->
        <a href="{{ route('candidate.jobs.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-gray-500 hover:text-linkedin-blue transition">
            <i class="fa-solid fa-arrow-left"></i> Back to search results
        </a>

        <!-- Main Job Info Card -->
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
            <div class="p-8">
                <div class="flex justify-between items-start gap-6">
                    <div class="flex gap-6">
                        <div class="w-20 h-20 bg-blue-50 rounded-lg border border-gray-100 flex items-center justify-center text-linkedin-blue font-bold text-4xl">
                            {{ $job->title[0] }}
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold mb-1">{{ $job->title }}</h1>
                            <p class="text-lg text-gray-800">{{ $job->company->name }} <span class="mx-1 text-gray-300">•</span> <span class="text-linkedin-blue font-bold hover:underline cursor-pointer">Visit Company Website</span></p>
                            <p class="text-gray-500 text-sm mt-1">{{ $job->location }} <span class="mx-1 text-gray-300">•</span> {{ $job->created_at->diffForHumans() }} <span class="mx-1 text-gray-300">•</span> <span class="text-linkedin-blue font-bold">{{ $job->applicants->count() }} applicants</span></p>
                            
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-100 flex items-center gap-1">
                                    <i class="fa-solid fa-bolt"></i> Easy Apply
                                </span>
                                <span class="bg-blue-50 text-linkedin-blue px-3 py-1 rounded-full text-xs font-bold border border-blue-100">
                                    {{ ucwords($job->type) }}
                                </span>
                                <span class="bg-gray-50 text-gray-600 px-3 py-1 rounded-full text-xs font-bold border border-gray-100">
                                    {{ ucwords($job->experience) }} level
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        @if(auth()->user()->appliedJob()->where('company_job_id', $job->id)->exists())
                            <button disabled class="bg-gray-200 text-gray-500 px-8 py-2.5 rounded-full font-bold cursor-not-allowed">
                                Already Applied
                            </button>
                        @else
                            <button onclick="openApplyModal()" class="bg-linkedin-blue text-white px-8 py-2.5 rounded-full font-bold hover:bg-linkedin-darkBlue transition shadow-sm">
                                Apply Now
                            </button>
                        @endif
                        <button class="border border-linkedin-blue text-linkedin-blue px-6 py-2.5 rounded-full font-bold hover:bg-blue-50 transition">
                            Save
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-100 flex items-center gap-6">
                <div class="flex items-center gap-2 text-sm">
                    <i class="fa-solid fa-briefcase text-gray-400"></i>
                    <span class="text-gray-600">10,001+ employees</span>
                </div>
                <div class="flex items-center gap-2 text-sm">
                    <i class="fa-solid fa-list-check text-gray-400"></i>
                    <span class="text-gray-600">Recruiter was active recently</span>
                </div>
            </div>
        </div>

        <!-- Job Description & Details -->
        <div class="grid lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <!-- Description -->
                <div class="bg-white rounded-lg border border-gray-200 p-8 shadow-sm">
                    <h2 class="text-xl font-bold mb-6">About the job</h2>
                    <div class="prose prose-sm max-w-none text-gray-700 space-y-4">
                        <p>{{ $job->description }}</p>
                        
                        @if($job->responsibilities)
                            <h3 class="font-bold text-gray-900 mt-6">Responsibilities:</h3>
                            <ul class="list-disc pl-5 space-y-2">
                                @foreach(json_decode($job->responsibilities, true) ?? [] as $responsibility)
                                    <li>{{ $responsibility }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if($job->requirements)
                            <h3 class="font-bold text-gray-900 mt-6">Requirements:</h3>
                            <ul class="list-disc pl-5 space-y-2">
                                @foreach(json_decode($job->requirements, true) ?? [] as $requirement)
                                    <li>{{ $requirement }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if($job->benefits)
                            <h3 class="font-bold text-gray-900 mt-6">Benefits:</h3>
                            <ul class="list-disc pl-5 space-y-2">
                                @foreach(json_decode($job->benefits, true) ?? [] as $benefit)
                                    <li>{{ $benefit }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <!-- Skills -->
                <div class="bg-white rounded-lg border border-gray-200 p-8 shadow-sm">
                    <h2 class="text-xl font-bold mb-4">Skills match</h2>
                    <p class="text-sm text-gray-500 mb-6">Based on your profile, here are the skills you have for this role:</p>
                    <div class="flex flex-wrap gap-3">
                        <span class="bg-green-50 text-green-700 px-4 py-2 rounded-full text-sm font-bold border border-green-100 flex items-center gap-2">
                            <i class="fa-solid fa-check"></i> PHP
                        </span>
                        <span class="bg-green-50 text-green-700 px-4 py-2 rounded-full text-sm font-bold border border-green-100 flex items-center gap-2">
                            <i class="fa-solid fa-check"></i> Laravel
                        </span>
                        <span class="bg-red-50 text-red-700 px-4 py-2 rounded-full text-sm font-bold border border-red-100 flex items-center gap-2">
                            <i class="fa-solid fa-xmark"></i> SQL
                        </span>
                    </div>
                    <button class="mt-6 text-sm font-bold text-linkedin-blue hover:underline">See how you compare to other applicants</button>
                </div>
            </div>

            <!-- Sidebar Info -->
            <div class="lg:col-span-1 space-y-6">
                <!-- About Company -->
                <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
                    <h2 class="font-bold mb-4">About the company</h2>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-blue-50 rounded border border-gray-100 flex items-center justify-center text-linkedin-blue font-bold text-xl">
                            {{ $job->company->name[0] }}
                        </div>
                        <div>
                            <h3 class="font-bold text-sm">{{ $job->company->name }}</h3>
                            <p class="text-xs text-gray-500">142,342 followers</p>
                        </div>
                    </div>
                    <p class="text-xs text-gray-600 mb-4 line-clamp-3">{{ $job->company->description }}</p>
                    <button class="w-full border border-linkedin-blue text-linkedin-blue py-1.5 rounded-full text-xs font-bold hover:bg-blue-50 transition">
                        Follow
                    </button>
                </div>

                <!-- Similar Jobs -->
                <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
                    <h2 class="font-bold mb-4">Similar jobs</h2>
                    <div class="space-y-4">
                        <div class="flex gap-3 cursor-pointer group">
                            <div class="w-10 h-10 bg-gray-50 rounded flex items-center justify-center text-gray-400">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold group-hover:text-linkedin-blue group-hover:underline">Backend Developer</h4>
                                <p class="text-[10px] text-gray-500">CloudSystems • London</p>
                                <p class="text-[10px] text-green-600 font-bold mt-1">Applied 2 days ago</p>
                            </div>
                        </div>
                    </div>
                    <button class="w-full mt-6 text-xs font-bold text-gray-500 hover:text-gray-700">View more recommendations</button>
                </div>
            </div>
        </div>
    </div>

    <x-apply-modal :job="$job" />
@endsection
