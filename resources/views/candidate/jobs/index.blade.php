@extends('layouts.candidate')

@section('title', 'Search Jobs | JobConnect')

@section('candidate-content')
    <div class="space-y-6">
        <!-- Search & Filter Bar -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <div class="grid md:grid-cols-3 gap-4">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input type="text" placeholder="Job title, keywords, or company" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm">
                </div>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fa-solid fa-location-dot"></i>
                    </span>
                    <input type="text" placeholder="City, state, or zip code" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm">
                </div>
                <button class="bg-linkedin-blue text-white px-6 py-2 rounded-full font-bold hover:bg-linkedin-darkBlue transition shadow-sm">
                    Search
                </button>
            </div>

            <!-- Filters Quick Chips -->
            <div class="mt-4 flex flex-wrap gap-2">
                <select class="px-3 py-1.5 border border-gray-300 rounded-full text-xs font-bold text-gray-600 focus:outline-none hover:bg-gray-50 cursor-pointer transition">
                    <option>Date Posted</option>
                    <option>Any Time</option>
                    <option>Past 24 hours</option>
                    <option>Past Week</option>
                    <option>Past Month</option>
                </select>
                <select class="px-3 py-1.5 border border-gray-300 rounded-full text-xs font-bold text-gray-600 focus:outline-none hover:bg-gray-50 cursor-pointer transition">
                    <option>Experience Level</option>
                    <option>Entry Level</option>
                    <option>Mid-Senior</option>
                    <option>Director</option>
                </select>
                <select class="px-3 py-1.5 border border-gray-300 rounded-full text-xs font-bold text-gray-600 focus:outline-none hover:bg-gray-50 cursor-pointer transition">
                    <option>Job Type</option>
                    <option>Full-time</option>
                    <option>Part-time</option>
                    <option>Contract</option>
                    <option>Remote</option>
                </select>
                <select class="px-3 py-1.5 border border-gray-300 rounded-full text-xs font-bold text-gray-600 focus:outline-none hover:bg-gray-50 cursor-pointer transition">
                    <option>Salary Range</option>
                    <option>$40k - $60k</option>
                    <option>$60k - $100k</option>
                    <option>$100k+</option>
                </select>
            </div>
        </div>

        <!-- Results Info -->
        <div class="flex justify-between items-center">
            <h2 class="text-sm font-bold text-gray-600">Showing 245 jobs based on your preferences</h2>
            <div class="flex items-center gap-2">
                <span class="text-xs text-gray-500">Sort by:</span>
                <select class="text-xs font-bold text-gray-700 bg-transparent focus:outline-none cursor-pointer">
                    <option>Most Recent</option>
                    <option>Most Relevant</option>
                </select>
            </div>
        </div>

        <!-- Job Cards List -->
        <div class="space-y-3">
            <!-- Job Card 1 -->
            <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm hover:shadow-md transition cursor-pointer group">
                <div class="flex gap-4">
                    <div class="w-14 h-14 bg-blue-50 rounded border border-gray-100 flex items-center justify-center text-linkedin-blue font-bold text-2xl">
                        <i class="fa-brands fa-laravel"></i>
                    </div>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-lg text-linkedin-blue group-hover:underline">Senior Laravel Developer</h3>
                                <p class="text-sm text-gray-800">TechSolutions Inc.</p>
                                <p class="text-sm text-gray-500">London, UK (Remote)</p>
                            </div>
                            <button class="text-gray-400 hover:text-linkedin-blue transition">
                                <i class="fa-regular fa-bookmark text-xl"></i>
                            </button>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-3 items-center text-xs text-gray-500">
                            <span class="flex items-center gap-1"><i class="fa-solid fa-clock"></i> 2 hours ago</span>
                            <span class="flex items-center gap-1 text-green-600 font-bold"><i class="fa-solid fa-bolt"></i> Easy Apply</span>
                            <span class="flex items-center gap-1"><i class="fa-solid fa-user-group"></i> 45 applicants</span>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('candidate.jobs.show', ['id' => 1]) }}" class="inline-block bg-linkedin-blue text-white px-4 py-1.5 rounded-full text-sm font-bold hover:bg-linkedin-darkBlue transition">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Job Card 2 -->
            <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm hover:shadow-md transition cursor-pointer group">
                <div class="flex gap-4">
                    <div class="w-14 h-14 bg-blue-50 rounded border border-gray-100 flex items-center justify-center text-linkedin-blue font-bold text-2xl">
                        <i class="fa-brands fa-react"></i>
                    </div>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-lg text-linkedin-blue group-hover:underline">Frontend Engineer (React)</h3>
                                <p class="text-sm text-gray-800">Creative Agency</p>
                                <p class="text-sm text-gray-500">Manchester, UK (Hybrid)</p>
                            </div>
                            <button class="text-gray-400 hover:text-linkedin-blue transition">
                                <i class="fa-regular fa-bookmark text-xl"></i>
                            </button>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-3 items-center text-xs text-gray-500">
                            <span class="flex items-center gap-1"><i class="fa-solid fa-clock"></i> 5 hours ago</span>
                            <span class="flex items-center gap-1"><i class="fa-solid fa-user-group"></i> 12 applicants</span>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('candidate.jobs.show', ['id' => 2]) }}" class="inline-block bg-linkedin-blue text-white px-4 py-1.5 rounded-full text-sm font-bold hover:bg-linkedin-darkBlue transition">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Job Card 3 -->
            <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm hover:shadow-md transition cursor-pointer group">
                <div class="flex gap-4">
                    <div class="w-14 h-14 bg-blue-50 rounded border border-gray-100 flex items-center justify-center text-linkedin-blue font-bold text-2xl">
                        <i class="fa-solid fa-database"></i>
                    </div>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-lg text-linkedin-blue group-hover:underline">Database Administrator</h3>
                                <p class="text-sm text-gray-800">FinanceCorp</p>
                                <p class="text-sm text-gray-500">Edinburgh, UK (On-site)</p>
                            </div>
                            <button class="text-gray-400 hover:text-linkedin-blue transition">
                                <i class="fa-regular fa-bookmark text-xl"></i>
                            </button>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-3 items-center text-xs text-gray-500">
                            <span class="flex items-center gap-1"><i class="fa-solid fa-clock"></i> 1 day ago</span>
                            <span class="flex items-center gap-1"><i class="fa-solid fa-user-group"></i> 89 applicants</span>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('candidate.jobs.show', ['id' => 3]) }}" class="inline-block bg-linkedin-blue text-white px-4 py-1.5 rounded-full text-sm font-bold hover:bg-linkedin-darkBlue transition">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center pt-6">
            <nav class="flex items-center gap-2">
                <button class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-200 text-gray-500 transition"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="w-8 h-8 flex items-center justify-center rounded-full bg-linkedin-blue text-white font-bold text-sm">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-200 text-gray-700 font-bold text-sm transition">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-200 text-gray-700 font-bold text-sm transition">3</button>
                <span class="text-gray-400">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-200 text-gray-700 font-bold text-sm transition">12</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-200 text-gray-500 transition"><i class="fa-solid fa-chevron-right"></i></button>
            </nav>
        </div>
    </div>
@endsection
