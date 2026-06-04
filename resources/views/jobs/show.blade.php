@extends('layouts.app')

@section('title', 'Job Details | JobConnect')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Back Button -->
            <a href="{{ route('jobs.index') }}"
                class="inline-flex items-center gap-2 text-sm font-bold text-gray-500 hover:text-linkedin-blue transition mb-6">
                <i class="fa-solid fa-arrow-left"></i> Back to search
            </a>

            <!-- Main Job Card -->
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                <div class="p-8">
                    <div class="flex justify-between items-start gap-6">
                        <div class="flex gap-6">
                            <div
                                class="w-20 h-20 bg-blue-50 rounded-lg border border-gray-100 flex items-center justify-center text-linkedin-blue font-bold text-4xl">
                                G</div>
                            <div>
                                <h1 class="text-2xl font-bold mb-1">{{ $job->title }}</h1>
                                <p class="text-lg text-gray-800">{{ $job->company->name }}</p>
                                <p class="text-gray-500 text-sm mt-1">{{ $job->location }} <span
                                        class="mx-1 text-gray-300">•</span> {{ $job->created_at->diffForHumans() }} <span
                                        class="mx-1 text-gray-300">•</span> <span
                                        class="text-linkedin-blue font-bold">{{ $job->applicants->count() }} applicants

                                        <div class="mt-4 flex flex-wrap gap-2">
                                            <span
                                                class="bg-blue-50 text-linkedin-blue px-3 py-1 rounded-full text-xs font-bold border border-blue-100">{{ ucwords($job->type) }}</span>
                                            <span
                                                class="bg-gray-50 text-gray-600 px-3 py-1 rounded-full text-xs font-bold border border-gray-100">{{ ucwords($job->experience) }}
                                                level</span>
                                        </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3">
                            @auth
                                @if (auth()->user()->role === 'candidate')
                                    <button onclick="openApplyModal()"
                                        class="bg-linkedin-blue text-white px-8 py-2.5 rounded-full font-bold hover:bg-linkedin-darkBlue transition shadow-sm">
                                        Apply Now
                                    </button>
                                @endif
                            @else
                                <a href="{{ route('login') }}"
                                    class="bg-linkedin-blue text-white px-8 py-2.5 rounded-full font-bold hover:bg-linkedin-darkBlue transition shadow-sm text-center">
                                    Login to Apply
                                </a>
                            @endauth
                            <button
                                class="border border-linkedin-blue text-linkedin-blue px-6 py-2.5 rounded-full font-bold hover:bg-blue-50 transition">
                                Save Job
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Job Details -->
                <div class="p-8 border-t border-gray-100">
                    <h2 class="text-xl font-bold mb-6">About the job</h2>
                    <div class="prose prose-sm max-w-none text-gray-700 space-y-4">
                        <p>{{ $job->description }}</p>

                        @if ($job->benefits)
                            <h3 class="font-bold text-gray-900 mt-6">Benefits:</h3>
                            <ul class="list-disc pl-5 space-y-2">
                                @foreach ($job->benefits as $benefit)
                                    <li>{{ $benefit }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if ($job->responsibilities)
                            <h3 class="font-bold text-gray-900 mt-6">Responsibilities:</h3>
                            <ul class="list-disc pl-5 space-y-2">
                                @foreach ($job->responsibilities as $responsibility)
                                    <li>{{ $responsibility }}</li>
                                @endforeach

                            </ul>
                        @endif

                        @if ($job->requirements)
                            <h3 class="font-bold text-gray-900 mt-6">Requirements:</h3>
                            <ul class="list-disc pl-5 space-y-2">
                                @foreach ($job->requirements as $requirement)
                                    <li>{{ $requirement }}</li>
                                @endforeach
                            </ul>
                        @endif

                    </div>
                </div>
            </div>

            <!-- Sidebar Info (Optional for public view) -->
            <div class="mt-8 bg-white rounded-lg border border-gray-200 p-8 shadow-sm">
                <h2 class="font-bold mb-4">{{ $job->company->name }}</h2>
                <p class="text-sm text-gray-600">{{ $job->company->description }}</p>
            </div>
        </div>
    </div>

    @auth
        @if(auth()->user()->role === 'candidate')
            <x-apply-modal :job="$job" />
        @endif
    @endauth
@endsection

@section('footer')
    @include('components.footer')
@endsection
