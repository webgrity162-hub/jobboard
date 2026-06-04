@extends('layouts.candidate')

@section('title', 'Skill Assessments | JobConnect')

@section('candidate-content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <h1 class="text-xl font-bold mb-1">Skill Assessments</h1>
            <p class="text-sm text-gray-500">Showcase your proficiency and get noticed by recruiters</p>
        </div>

        <!-- Progress Overview -->
        <div class="grid md:grid-cols-3 gap-4">
            <div class="bg-white rounded-lg border border-gray-200 p-4 shadow-sm text-center">
                <div class="text-2xl font-bold text-linkedin-blue mb-1">12</div>
                <div class="text-xs text-gray-500 font-bold uppercase">Badges Earned</div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-4 shadow-sm text-center">
                <div class="text-2xl font-bold text-gray-700 mb-1">85%</div>
                <div class="text-xs text-gray-500 font-bold uppercase">Avg. Percentile</div>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-4 shadow-sm text-center">
                <div class="text-2xl font-bold text-green-600 mb-1">4</div>
                <div class="text-xs text-gray-500 font-bold uppercase">Active Tests</div>
            </div>
        </div>

        <!-- Recommended Assessments -->
        <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <h2 class="font-bold">Recommended for your profile</h2>
                <a href="#" class="text-sm text-linkedin-blue font-bold hover:underline">See all</a>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 divide-x divide-y divide-gray-100">
                <!-- Assessment Card 1 -->
                <div class="p-6 hover:bg-gray-50 transition cursor-pointer group">
                    <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center text-linkedin-blue mb-4 group-hover:bg-linkedin-blue group-hover:text-white transition-colors">
                        <i class="fa-brands fa-laravel text-2xl"></i>
                    </div>
                    <h3 class="font-bold mb-1">Laravel</h3>
                    <p class="text-xs text-gray-500 mb-4 line-clamp-2">Test your knowledge of Eloquent, Routing, and Blade templates.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] text-gray-400 font-bold uppercase">15 mins • 20 MCQs</span>
                        <button class="text-xs font-bold text-linkedin-blue hover:underline">Start Test</button>
                    </div>
                </div>

                <!-- Assessment Card 2 -->
                <div class="p-6 hover:bg-gray-50 transition cursor-pointer group">
                    <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center text-linkedin-blue mb-4 group-hover:bg-linkedin-blue group-hover:text-white transition-colors">
                        <i class="fa-brands fa-react text-2xl"></i>
                    </div>
                    <h3 class="font-bold mb-1">React.js</h3>
                    <p class="text-xs text-gray-500 mb-4 line-clamp-2">Covers Hooks, Lifecycle, Redux, and Component patterns.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] text-gray-400 font-bold uppercase">20 mins • 25 MCQs</span>
                        <button class="text-xs font-bold text-linkedin-blue hover:underline">Start Test</button>
                    </div>
                </div>

                <!-- Assessment Card 3 -->
                <div class="p-6 hover:bg-gray-50 transition cursor-pointer group">
                    <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center text-linkedin-blue mb-4 group-hover:bg-linkedin-blue group-hover:text-white transition-colors">
                        <i class="fa-brands fa-js-square text-2xl"></i>
                    </div>
                    <h3 class="font-bold mb-1">JavaScript (ES6+)</h3>
                    <p class="text-xs text-gray-500 mb-4 line-clamp-2">Validate your skills in Async/Await, Closures, and DOM.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] text-gray-400 font-bold uppercase">15 mins • 15 MCQs</span>
                        <button class="text-xs font-bold text-linkedin-blue hover:underline">Start Test</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earned Badges -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <h2 class="font-bold mb-4">Earned Badges</h2>
            <div class="flex flex-wrap gap-4">
                <div class="flex items-center gap-3 bg-gray-50 px-4 py-2 rounded-full border border-gray-100">
                    <i class="fa-solid fa-award text-yellow-500"></i>
                    <span class="text-sm font-bold text-gray-700">PHP Specialist</span>
                </div>
                <div class="flex items-center gap-3 bg-gray-50 px-4 py-2 rounded-full border border-gray-100">
                    <i class="fa-solid fa-award text-yellow-500"></i>
                    <span class="text-sm font-bold text-gray-700">MySQL Expert</span>
                </div>
                <div class="flex items-center gap-3 bg-gray-50 px-4 py-2 rounded-full border border-gray-100">
                    <i class="fa-solid fa-award text-yellow-500"></i>
                    <span class="text-sm font-bold text-gray-700">Tailwind CSS Proficient</span>
                </div>
            </div>
        </div>
    </div>
@endsection
