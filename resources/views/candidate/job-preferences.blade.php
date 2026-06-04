@extends('layouts.candidate')

@section('title', 'Job Preferences | JobConnect')

@section('candidate-content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <h1 class="text-xl font-bold mb-1">Job Preferences</h1>
            <p class="text-sm text-gray-500">Control your job search visibility and preferences</p>
        </div>

        <!-- Availability Status -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="font-bold">Open to Work</h2>
                    <p class="text-xs text-gray-500">Let recruiters know you're looking for new opportunities</p>
                </div>
                <div class="relative inline-block w-12 h-6 transition duration-200 ease-in-out bg-linkedin-blue rounded-full cursor-pointer">
                    <span class="absolute left-0 inline-block w-6 h-6 transition duration-200 ease-in-out transform translate-x-6 bg-white rounded-full shadow-md border border-gray-200"></span>
                </div>
            </div>
            
            <div class="space-y-6 pt-6 border-t border-gray-100">
                <!-- Job Titles -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Job Titles</label>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-blue-50 text-linkedin-blue px-3 py-1 rounded-full text-sm font-bold flex items-center gap-2 border border-blue-100">
                            Full Stack Developer <i class="fa-solid fa-xmark cursor-pointer"></i>
                        </span>
                        <span class="bg-blue-50 text-linkedin-blue px-3 py-1 rounded-full text-sm font-bold flex items-center gap-2 border border-blue-100">
                            Laravel Engineer <i class="fa-solid fa-xmark cursor-pointer"></i>
                        </span>
                        <button class="text-linkedin-blue text-sm font-bold hover:bg-blue-50 px-3 py-1 rounded-full border border-linkedin-blue transition">
                            <i class="fa-solid fa-plus mr-1"></i> Add Title
                        </button>
                    </div>
                </div>

                <!-- Job Locations -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Job Locations</label>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-blue-50 text-linkedin-blue px-3 py-1 rounded-full text-sm font-bold flex items-center gap-2 border border-blue-100">
                            Remote <i class="fa-solid fa-xmark cursor-pointer"></i>
                        </span>
                        <span class="bg-blue-50 text-linkedin-blue px-3 py-1 rounded-full text-sm font-bold flex items-center gap-2 border border-blue-100">
                            New York, NY <i class="fa-solid fa-xmark cursor-pointer"></i>
                        </span>
                        <button class="text-linkedin-blue text-sm font-bold hover:bg-blue-50 px-3 py-1 rounded-full border border-linkedin-blue transition">
                            <i class="fa-solid fa-plus mr-1"></i> Add Location
                        </button>
                    </div>
                </div>

                <!-- Work types -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-3">Employment Type</label>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3 text-sm text-gray-600">
                                <input type="checkbox" checked class="w-4 h-4 text-linkedin-blue rounded border-gray-300"> Full-time
                            </label>
                            <label class="flex items-center gap-3 text-sm text-gray-600">
                                <input type="checkbox" checked class="w-4 h-4 text-linkedin-blue rounded border-gray-300"> Contract
                            </label>
                            <label class="flex items-center gap-3 text-sm text-gray-600">
                                <input type="checkbox" class="w-4 h-4 text-linkedin-blue rounded border-gray-300"> Internship
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-3">Desired Salary</label>
                        <div class="flex items-center gap-3">
                            <input type="text" placeholder="Min. Annual Salary" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm">
                            <select class="px-4 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm">
                                <option>USD</option>
                                <option>EUR</option>
                                <option>GBP</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                <button class="bg-linkedin-blue text-white px-6 py-2 rounded-full font-bold hover:bg-linkedin-darkBlue transition shadow-sm">
                    Save Preferences
                </button>
            </div>
        </div>

        <!-- Privacy Settings -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <h2 class="font-bold mb-4">Visibility Settings</h2>
            <div class="space-y-4">
                <label class="flex items-start gap-4 p-3 rounded hover:bg-gray-50 cursor-pointer transition">
                    <input type="radio" name="visibility" checked class="mt-1 text-linkedin-blue">
                    <div>
                        <p class="text-sm font-bold text-gray-700">All Recruiters</p>
                        <p class="text-xs text-gray-500">Your profile is visible to all recruiters on JobConnect</p>
                    </div>
                </label>
                <label class="flex items-start gap-4 p-3 rounded hover:bg-gray-50 cursor-pointer transition">
                    <input type="radio" name="visibility" class="mt-1 text-linkedin-blue">
                    <div>
                        <p class="text-sm font-bold text-gray-700">Selective Recruiters</p>
                        <p class="text-xs text-gray-500">Only recruiters at companies you haven't worked for can see you</p>
                    </div>
                </label>
            </div>
        </div>
    </div>
@endsection
