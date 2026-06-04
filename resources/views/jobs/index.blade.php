@extends('layouts.app')

@section('title', 'Browse Jobs | JobConnect')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-4 gap-8">
                
                <!-- Sidebar Filters -->
                <aside class="lg:col-span-1 space-y-6">
                    <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
                        <h2 class="font-bold text-lg mb-6 flex items-center gap-2">
                            <i class="fa-solid fa-sliders text-linkedin-blue"></i> Filters
                        </h2>
                        
                        <!-- Search Title -->
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Job Title</label>
                            <input type="text" placeholder="e.g. Laravel Developer" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm">
                        </div>

                        <!-- Location -->
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Location</label>
                            <input type="text" placeholder="e.g. London, UK" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm">
                        </div>

                        <!-- Experience Level -->
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Experience Level</label>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                                    <input type="checkbox" class="rounded border-gray-300 text-linkedin-blue"> Entry Level
                                </label>
                                <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                                    <input type="checkbox" class="rounded border-gray-300 text-linkedin-blue"> Mid-Senior
                                </label>
                                <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                                    <input type="checkbox" class="rounded border-gray-300 text-linkedin-blue"> Director
                                </label>
                            </div>
                        </div>

                        <!-- Job Type -->
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Job Type</label>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                                    <input type="checkbox" class="rounded border-gray-300 text-linkedin-blue"> Full-time
                                </label>
                                <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                                    <input type="checkbox" class="rounded border-gray-300 text-linkedin-blue"> Contract
                                </label>
                                <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                                    <input type="checkbox" class="rounded border-gray-300 text-linkedin-blue"> Remote
                                </label>
                            </div>
                        </div>

                        <button class="w-full bg-linkedin-blue text-white py-2 rounded-full font-bold hover:bg-linkedin-darkBlue transition text-sm shadow-sm">
                            Apply Filters
                        </button>
                    </div>
                </aside>

                <!-- Main Content: Job List -->
                <main class="lg:col-span-3 space-y-6">
                    <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm flex justify-between items-center">
                        <h1 class="text-xl font-bold">Search Results</h1>
                        <span class="text-sm text-gray-500">{{ $jobs->total() }} jobs found</span>
                    </div>

                    <!-- Job Cards -->
                    <div class="space-y-4">
                        <!-- Job Item 1 -->
                        @foreach ($jobs as $job)
                        <div onclick="window.location='{{ route('jobs.show', ['slug' => $job->slug]) }}'" class="bg-white  p-6 rounded-lg border border-gray-200 hover:shadow-md transition cursor-pointer group">
                            <div class="flex gap-4">
                                <div class="w-14 h-14 bg-blue-50 rounded-lg flex items-center justify-center text-linkedin-blue font-bold text-2xl">{{ Str::substr($job->company->name, 0, 1) }}</div>
                                <div class="flex-grow">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-bold text-lg text-linkedin-blue group-hover:underline">{{ $job->title }} </h3>
                                            <p class="text-sm text-gray-800 font-semibold">{{ $job->company->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $job->location }}</p>
                                        </div>
                                        <a href="{{ route('jobs.show', ['slug' => $job->slug]) }}" class="text-xs font-bold text-linkedin-blue border border-linkedin-blue px-4 py-1.5 rounded-full hover:bg-blue-50 transition">View Details</a>
                                    </div>
                                    <div class="mt-4 flex gap-4 text-xs text-gray-500 items-center">
                                        <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded font-bold">{{ $job->status }}</span>
                                        <span><i class="fa-regular fa-clock mr-1"></i> {{ $job->created_at->diffForHumans() }}</span>
                                        <span><i class="fa-solid fa-user-group mr-1"></i> {{ $job->applicants()->count() ?? '0'}} applicants</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{ $jobs->links() }}
 
                        @if ($jobs->isEmpty())
                        <p class="text-center text-gray-500">No jobs found.</p>
                        @endif
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
