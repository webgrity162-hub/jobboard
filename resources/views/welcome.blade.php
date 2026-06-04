@extends('layouts.app')

@section('title', 'JobConnect - Find Your Dream Job')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="bg-white pt-16 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-5xl md:text-6xl font-light text-linkedin-darkBlue mb-8 leading-tight">
                        Welcome to your <br><span class="font-semibold">professional community</span>
                    </h1>
                    
                    <form action="{{ route('jobs.index') }}" method="GET" class="space-y-4 max-w-lg">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input type="text" name="title" placeholder="Search job titles or companies" class="block w-full pl-10 pr-3 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-linkedin-blue focus:border-transparent text-lg">
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                <i class="fa-solid fa-location-dot"></i>
                            </span>
                            <input type="text" name="location" placeholder="City, state, or zip code" class="block w-full pl-10 pr-3 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-linkedin-blue focus:border-transparent text-lg">
                        </div>
                        <button type="submit" class="w-full bg-linkedin-blue text-white py-4 rounded-full text-xl font-semibold hover:bg-linkedin-darkBlue transition shadow-md">
                            Search Jobs
                        </button>
                    </form>

                    <div class="mt-12 flex gap-8 text-sm text-gray-500">
                        <div>
                            <span class="block text-2xl font-bold text-gray-900">1.2M+</span>
                            Active Jobs
                        </div>
                        <div>
                            <span class="block text-2xl font-bold text-gray-900">450K+</span>
                            Companies
                        </div>
                        <div>
                            <span class="block text-2xl font-bold text-gray-900">80M+</span>
                            Candidates
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <img src="https://media.istockphoto.com/id/1252679603/vector/job-search-vector-concept-flat-style-design-illustration.jpg?s=612x612&w=0&k=20&c=raq_7dNUZ-yDXLBDNp9tegUg4cwTbaX7a6chziU5SpE=" alt="Hero Image" class="w-full h-auto">
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Jobs -->
    <section class="py-20 bg-linkedin-lightBlue">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Featured Opportunities</h2>
                    <p class="text-gray-600">Explore top roles at leading companies</p>
                </div>
                <a href="{{ route('jobs.index') }}" class="text-linkedin-blue font-semibold hover:underline flex items-center gap-1">
                    See all jobs <i class="fa-solid fa-arrow-right text-sm"></i>
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Job Card 1 -->
                @foreach ($jobs as $job )
                
              
                <a href="{{ route('jobs.show', ['slug' => $job->slug]) }}" class="bg-white p-6 rounded-xl border border-gray-200 hover:shadow-lg transition cursor-pointer group block">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-md flex items-center justify-center text-linkedin-blue font-bold text-xl">{{ $job->company->name[0] }}</div>
                        <div>
                            <h3 class="font-bold text-lg group-hover:text-linkedin-blue transition">{{ $job->title }}</h3>
                            <p class="text-gray-600">{{ $job->company->name }}</p>
                        </div>
                    </div>
                    <div class="flex gap-2 mb-6">
                        <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded">{{ ucfirst($job->type) }}</span>
                        <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">{{ ucfirst($job->experience) }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-500"><i class="fa-regular fa-clock mr-1"></i> {{ $job->created_at->diffForHumans() }}</span>
                        <span class="font-bold text-gray-900">${{rtrim( rtrim($job->salary_min,'0'),'.') }} - ${{ rtrim( rtrim($job->salary_max,'0'),'.') }}</span>
                    </div>
                </a>
                  @endforeach
                  @if ($jobs->isEmpty())
                  <p class="text-center text-gray-600">No jobs found.</p>
                  @endif
              
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-16">How it works</h2>
            <div class="grid md:grid-cols-3 gap-12">
                <div class="space-y-4">
                    <div class="w-20 h-20 bg-linkedin-lightBlue text-linkedin-blue rounded-full flex items-center justify-center mx-auto text-3xl">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>
                    <h3 class="text-xl font-bold">1. Create an Account</h3>
                    <p class="text-gray-600">Sign up as a candidate or employer to get started with your professional journey.</p>
                </div>
                <div class="space-y-4">
                    <div class="w-20 h-20 bg-linkedin-lightBlue text-linkedin-blue rounded-full flex items-center justify-center mx-auto text-3xl">
                        <i class="fa-solid fa-file-invoice"></i>
                    </div>
                    <h3 class="text-xl font-bold">2. Complete Your Profile</h3>
                    <p class="text-gray-600">Build a professional profile or post your first job opening to reach the right people.</p>
                </div>
                <div class="space-y-4">
                    <div class="w-20 h-20 bg-linkedin-lightBlue text-linkedin-blue rounded-full flex items-center justify-center mx-auto text-3xl">
                        <i class="fa-solid fa-rocket"></i>
                    </div>
                    <h3 class="text-xl font-bold">3. Land Your Dream Job</h3>
                    <p class="text-gray-600">Apply to jobs with one click or manage applicants efficiently from your dashboard.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('components.footer')
@endsection
