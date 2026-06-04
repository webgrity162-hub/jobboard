@extends('layouts.candidate')

@section('title', 'Job Alerts | JobConnect')

@section('candidate-content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm flex justify-between items-center">
            <div>
                <h1 class="text-xl font-bold mb-1">Job Alerts</h1>
                <p class="text-sm text-gray-500">Manage your saved searches and job notifications</p>
            </div>
            <button class="bg-linkedin-blue text-white px-4 py-2 rounded-full text-sm font-bold hover:bg-linkedin-darkBlue transition shadow-sm">
                Create Job Alert
            </button>
        </div>

        <!-- Alerts List -->
        <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h2 class="font-bold">Your Active Alerts (3)</h2>
            </div>
            <div class="divide-y divide-gray-100">
                <!-- Alert Item 1 -->
                <div class="p-6 hover:bg-gray-50 transition flex justify-between items-center">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                            <i class="fa-solid fa-magnifying-glass text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Senior Laravel Developer</h3>
                            <p class="text-sm text-gray-600">Remote • Full-time • Daily</p>
                            <div class="mt-2 flex items-center gap-3">
                                <span class="text-xs text-green-600 font-bold bg-green-50 px-2 py-0.5 rounded">Active</span>
                                <span class="text-xs text-gray-500">Last alert: 2 hours ago</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2 mr-4">
                            <span class="text-xs text-gray-500 font-bold uppercase">Notifications</span>
                            <div class="relative inline-block w-10 h-5 transition duration-200 ease-in-out bg-linkedin-blue rounded-full cursor-pointer">
                                <span class="absolute left-0 inline-block w-5 h-5 transition duration-200 ease-in-out transform translate-x-5 bg-white rounded-full shadow-sm"></span>
                            </div>
                        </div>
                        <button class="text-gray-400 hover:text-gray-600 p-2"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="text-red-400 hover:text-red-600 p-2"><i class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div>

                <!-- Alert Item 2 -->
                <div class="p-6 hover:bg-gray-50 transition flex justify-between items-center">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                            <i class="fa-solid fa-magnifying-glass text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">React Frontend Engineer</h3>
                            <p class="text-sm text-gray-600">New York, NY • Hybrid • Weekly</p>
                            <div class="mt-2 flex items-center gap-3">
                                <span class="text-xs text-green-600 font-bold bg-green-50 px-2 py-0.5 rounded">Active</span>
                                <span class="text-xs text-gray-500">Last alert: 3 days ago</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2 mr-4">
                            <span class="text-xs text-gray-500 font-bold uppercase">Notifications</span>
                            <div class="relative inline-block w-10 h-5 transition duration-200 ease-in-out bg-linkedin-blue rounded-full cursor-pointer">
                                <span class="absolute left-0 inline-block w-5 h-5 transition duration-200 ease-in-out transform translate-x-5 bg-white rounded-full shadow-sm"></span>
                            </div>
                        </div>
                        <button class="text-gray-400 hover:text-gray-600 p-2"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="text-red-400 hover:text-red-600 p-2"><i class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Preferences -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <h2 class="font-bold mb-4">Notification Settings</h2>
            <div class="space-y-4">
                <div class="flex items-center justify-between py-2">
                    <div>
                        <p class="font-bold text-sm">Email Notifications</p>
                        <p class="text-xs text-gray-500">Receive job matches in your inbox</p>
                    </div>
                    <input type="checkbox" checked class="w-4 h-4 text-linkedin-blue border-gray-300 rounded focus:ring-linkedin-blue">
                </div>
                <div class="flex items-center justify-between py-2">
                    <div>
                        <p class="font-bold text-sm">Push Notifications</p>
                        <p class="text-xs text-gray-500">Get instant alerts on your mobile device</p>
                    </div>
                    <input type="checkbox" checked class="w-4 h-4 text-linkedin-blue border-gray-300 rounded focus:ring-linkedin-blue">
                </div>
            </div>
        </div>
    </div>
@endsection
