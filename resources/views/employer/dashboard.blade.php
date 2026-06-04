@extends('layouts.employer')

@section('title', 'Recruitment Overview | TalentStream')

@section('employer-content')
    <div class="space-y-8">
        <!-- Header -->
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Recruitment Overview</h1>
            <p class="text-gray-500 mt-1 font-medium">Manage your active talent pipeline and job performance.</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Active Jobs -->
            <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-blue-50 text-linkedin-blue rounded-xl group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-briefcase text-xl"></i>
                    </div>
                    <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-1 rounded-full uppercase tracking-wider">+2 this week</span>
                </div>
                <p class="text-sm font-semibold text-gray-500">Total Active Jobs</p>
                <h3 class="text-3xl font-bold text-gray-900 mt-1">12</h3>
            </div>

            <!-- New Applicants -->
            <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-user-plus text-xl"></i>
                    </div>
                    <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-1 rounded-full uppercase tracking-wider">+12.4%</span>
                </div>
                <p class="text-sm font-semibold text-gray-500">New Applicants</p>
                <h3 class="text-3xl font-bold text-gray-900 mt-1">34</h3>
            </div>

            <!-- Interviewing -->
            <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-comments text-xl"></i>
                    </div>
                    <span class="text-[10px] font-bold text-gray-500 bg-gray-50 px-2 py-1 rounded-full uppercase tracking-wider">Across 4 roles</span>
                </div>
                <p class="text-sm font-semibold text-gray-500">Interviewing</p>
                <h3 class="text-3xl font-bold text-gray-900 mt-1">12</h3>
            </div>

            <!-- Hired -->
            <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-xl group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-circle-check text-xl"></i>
                    </div>
                    <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded-full uppercase tracking-wider">Goal: 5/mo</span>
                </div>
                <p class="text-sm font-semibold text-gray-500">Hired</p>
                <h3 class="text-3xl font-bold text-gray-900 mt-1">3</h3>
            </div>
        </div>

        <!-- Main Content Row -->
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Recent Applications Table -->
            <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                    <h2 class="font-bold text-gray-900">Recent Applications</h2>
                    <a href="{{ route('employer.applicants') }}" class="text-xs font-bold text-linkedin-blue hover:underline">View all</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-50/50 text-[11px] font-bold text-gray-400 uppercase tracking-widest">
                                <th class="px-5 py-3">Candidate Name</th>
                                <th class="px-5 py-3">Job Title</th>
                                <th class="px-3 py-3">Date Applied</th>
                                <th class="px-3 py-3">Status</th>
                                <th class="px-3 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            <!-- Row 1 -->
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="px-5 py-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-[10px] font-bold">JS</div>
                                        <span class="text-sm font-bold text-gray-900">Jordan Smith</span>
                                    </div>
                                </td>
                                <td class="px-5 py-3">
                                    <span class="text-sm text-gray-600 font-medium">Senior Product Designer</span>
                                </td>
                                <td class="px-3 py-3">
                                    <span class="text-sm text-gray-500 font-medium">Oct 24, 2023</span>
                                </td>
                                <td class="px-3 py-3">
                                    <span class="text-[10px] font-bold px-2 py-1 rounded-full bg-emerald-50 text-emerald-600 uppercase">Interviewing</span>
                                </td>
                                <td class="px-3 py-3 text-left">
                                    <button class="text-gray-300 hover:text-gray-600 transition-colors">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center text-[10px] font-bold">ML</div>
                                        <span class="text-sm font-bold text-gray-900">Marcus Lee</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600 font-medium">Backend Engineer</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-500 font-medium">Oct 23, 2023</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-[10px] font-bold px-2 py-1 rounded-full bg-blue-50 text-blue-600 uppercase">New</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-gray-300 hover:text-gray-600 transition-colors">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Row 3 -->
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-[10px] font-bold">SC</div>
                                        <span class="text-sm font-bold text-gray-900">Sarah Chen</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600 font-medium">Head of Marketing</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-500 font-medium">Oct 22, 2023</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-[10px] font-bold px-2 py-1 rounded-full bg-indigo-50 text-indigo-600 uppercase">Under Review</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-gray-300 hover:text-gray-600 transition-colors">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Row 4 -->
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center text-[10px] font-bold">RA</div>
                                        <span class="text-sm font-bold text-gray-900">Riley Adams</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600 font-medium">HR Manager</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-500 font-medium">Oct 21, 2023</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-[10px] font-bold px-2 py-1 rounded-full bg-rose-50 text-rose-600 uppercase">Rejected</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-gray-300 hover:text-gray-600 transition-colors">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Job Performance Sidebar -->
            <div class="space-y-6">
                <!-- Conversion Card -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="font-bold text-gray-900">Job Performance</h2>
                        <i class="fa-solid fa-chart-column text-gray-300"></i>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between text-[11px] font-bold text-gray-400 uppercase tracking-widest">
                            <span>Views vs Applications</span>
                            <span class="text-linkedin-blue">72% conversion</span>
                        </div>
                        <div class="h-2 w-full bg-gray-100 rounded-full overflow-hidden flex">
                            <div class="h-full bg-linkedin-blue rounded-full" style="width: 72%"></div>
                        </div>
                        <div class="flex gap-4 text-[10px] font-bold uppercase tracking-wider">
                            <div class="flex items-center gap-1.5 text-linkedin-blue">
                                <span class="w-2 h-2 rounded-full bg-linkedin-blue"></span> APPS
                            </div>
                            <div class="flex items-center gap-1.5 text-gray-300">
                                <span class="w-2 h-2 rounded-full bg-gray-300"></span> VIEWS
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 space-y-4">
                        <h3 class="text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-4">Top Performing Roles</h3>
                        <!-- Role 1 -->
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-bold text-gray-900">Senior Product Designer</p>
                                <p class="text-[10px] text-gray-500 font-medium">45 Applicants • 12 Interviews</p>
                            </div>
                            <i class="fa-solid fa-arrow-trend-up text-green-500 text-xs"></i>
                        </div>
                        <!-- Role 2 -->
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-bold text-gray-900">Backend Engineer</p>
                                <p class="text-[10px] text-gray-500 font-medium">32 Applicants • 8 Interviews</p>
                            </div>
                            <i class="fa-solid fa-arrow-right text-gray-300 text-xs"></i>
                        </div>
                        <!-- Role 3 -->
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-bold text-gray-900">Sales Director</p>
                                <p class="text-[10px] text-gray-500 font-medium">12 Applicants • 2 Interviews</p>
                            </div>
                            <i class="fa-solid fa-arrow-trend-down text-rose-500 text-xs"></i>
                        </div>
                    </div>

                    <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <p class="text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2 flex items-center gap-2">
                            <i class="fa-solid fa-lightbulb text-yellow-500"></i> Recruitment Tip
                        </p>
                        <p class="text-[11px] text-gray-600 leading-relaxed font-medium">
                            Roles with "Senior" in the title are seeing 25% higher click-through rates this month.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Row -->
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Blue Banner -->
            <div class="lg:col-span-2 bg-gradient-to-r from-blue-600 to-linkedin-blue rounded-3xl p-8 text-white relative overflow-hidden group">
                <div class="relative z-10">
                    <h2 class="text-2xl font-bold mb-2">Automate your sourcing.</h2>
                    <p class="text-white/80 text-sm max-w-md leading-relaxed font-medium">
                        Our AI-driven matching engine identifies top-tier candidates before they even apply. Start a pilot program today.
                    </p>
                    <button class="mt-6 bg-white text-linkedin-blue px-6 py-2.5 rounded font-bold text-sm shadow-lg hover:shadow-xl transition-all transform hover:scale-105 active:scale-95">
                        Learn More
                    </button>
                </div>
                <!-- Abstract Background Shapes -->
                <div class="absolute -right-10 -top-10 w-64 h-64 bg-white/10 rounded-full blur-3xl group-hover:bg-white/20 transition-all duration-700"></div>
                <div class="absolute right-20 -bottom-20 w-48 h-48 bg-blue-400/20 rounded-full blur-2xl group-hover:bg-blue-400/30 transition-all duration-700"></div>
            </div>

            <!-- Team Collaboration Card -->
            <div class="bg-[#e9ecef]/50 p-8 rounded-3xl border border-gray-100 flex flex-col items-center text-center group hover:bg-[#e9ecef] transition-colors cursor-pointer">
                <div class="w-12 h-12 rounded-xl shadow-sm flex items-center justify-center text-linkedin-blue mb-4 group-hover:scale-110 transition-transform">
                    <img src="{{ asset( 'img/team-collaboration.svg') }}" alt="">
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Team Collaboration</h3>
                <p class="text-[11px] text-gray-500 font-medium leading-relaxed">
                    Sync your team members to streamline interview feedback.
                </p>
            </div>
        </div>
    </div>
@endsection
