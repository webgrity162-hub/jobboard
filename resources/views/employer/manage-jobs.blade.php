@extends('layouts.employer')
@section('title', 'Manage Jobs | TalentStream')

@section('employer-content')
    <div class="space-y-8">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Job Management</h1>
                <p class="mt-1 font-medium text-gray-500">Oversee your active listings and track candidate pipelines.</p>
            </div>
            <a href="#post-new-job" class="inline-flex items-center justify-center gap-2 rounded-xl bg-linkedin-blue px-6 py-2.5 font-bold text-white shadow-sm transition-all hover:bg-linkedin-darkBlue">
                <i class="fa-solid fa-plus text-xs"></i>
                Post New Job
            </a>
        </div>

        

        <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">
            <div class="overflow-x-auto border-b border-gray-200 bg-linkedin-blue px-6">
                <div class="flex min-w-max gap-8">
                    <button onclick="switchTab('all')" id="tab-all" class="flex items-center gap-2 border-b-2 border-linkedin-lightBlue py-4 text-sm font-bold text-linkedin-lightBlue transition-all">
                        All Jobs <span class="rounded-full bg-blue-200 px-2 py-0.5 text-[10px] text-linkedin-blue">24</span>
                    </button>
                    <button onclick="switchTab('active')" id="tab-active" class="flex items-center gap-2 border-b-2 border-transparent py-4 text-sm font-bold text-linkedin-lightBlue transition-all hover:text-linkedin-darkBlue">
                        Active <span class="rounded-full bg-blue-200 px-2 py-0.5 text-[10px] text-linkedin-blue">18</span>
                    </button>
                    <button onclick="switchTab('draft')" id="tab-draft" class="flex items-center gap-2 border-b-2 border-transparent py-4 text-sm font-bold text-linkedin-lightBlue transition-all hover:text-linkedin-darkBlue">
                        Draft <span class="rounded-full bg-blue-200 px-2 py-0.5 text-[10px] text-linkedin-blue">4</span>
                    </button>
                    <button onclick="switchTab('closed')" id="tab-closed" class="flex items-center gap-2 border-b-2 border-transparent py-4 text-sm font-bold text-linkedin-lightBlue transition-all hover:text-linkedin-darkBlue">
                        Closed <span class="rounded-full bg-blue-200 px-2 py-0.5 text-[10px] text-linkedin-blue">2</span>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-gray-100 bg-gray-200 text-[11px] font-bold uppercase tracking-widest text-gray-400">
                            <th class="px-8 py-4">Job Title & ID</th>
                            <th class="px-8 py-4">Location</th>
                            <th class="px-8 py-4">Type</th>
                            <th class="px-8 py-4">Applicants</th>
                            <th class="px-8 py-4">Status</th>
                            <th class="px-8 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <tr class="group transition-colors hover:bg-gray-50/50">
                            <td class="px-8 py-6">
                                <div>
                                    <h3 class="text-base font-bold text-gray-900">Senior Software Engineer</h3>
                                    <p class="mt-0.5 text-[11px] font-medium uppercase tracking-wider text-gray-400">REQ-2024-089 - Engineering</p>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-2 text-gray-600">
                                    <i class="fa-solid fa-location-dot text-xs text-gray-300"></i>
                                    <span class="text-sm font-medium">San Francisco, CA</span>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-sm font-medium text-gray-600">Full-time</td>
                            <td class="px-8 py-6">
                                <a href="#" class="flex items-center gap-1.5 text-sm font-bold text-linkedin-blue hover:underline">
                                    42 Applicants <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                                </a>
                            </td>
                            <td class="px-8 py-6">
                                <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-emerald-600">Active</span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end gap-3">
                                    <button class="text-gray-400 transition-colors hover:text-linkedin-blue"><i class="fa-solid fa-pen text-sm"></i></button>
                                    <button class="text-gray-400 transition-colors hover:text-rose-500"><i class="fa-solid fa-trash-can text-sm"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr class="group transition-colors hover:bg-gray-50/50">
                            <td class="px-8 py-6">
                                <div>
                                    <h3 class="text-base font-bold text-gray-900">Product Marketing Manager</h3>
                                    <p class="mt-0.5 text-[11px] font-medium uppercase tracking-wider text-gray-400">REQ-2024-075 - Marketing</p>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-2 text-gray-600">
                                    <i class="fa-solid fa-location-dot text-xs text-gray-300"></i>
                                    <span class="text-sm font-medium">New York, NY</span>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-sm font-medium text-gray-600">Full-time</td>
                            <td class="px-8 py-6">
                                <a href="#" class="flex items-center gap-1.5 text-sm font-bold text-linkedin-blue hover:underline">
                                    12 Applicants <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                                </a>
                            </td>
                            <td class="px-8 py-6">
                                <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-emerald-600">Active</span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end gap-3">
                                    <button class="text-gray-400 transition-colors hover:text-linkedin-blue"><i class="fa-solid fa-pen text-sm"></i></button>
                                    <button class="text-gray-400 transition-colors hover:text-rose-500"><i class="fa-solid fa-trash-can text-sm"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr class="group transition-colors hover:bg-gray-50/50">
                            <td class="px-8 py-6">
                                <div>
                                    <h3 class="text-base font-bold text-gray-900">UX Designer (Contract)</h3>
                                    <p class="mt-0.5 text-[11px] font-medium uppercase tracking-wider text-gray-400">REQ-2024-042 - Design</p>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-2 text-gray-600">
                                    <i class="fa-solid fa-location-dot text-xs text-gray-300"></i>
                                    <span class="text-sm font-medium">Remote</span>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-sm font-medium text-gray-600">Contract</td>
                            <td class="px-8 py-6">
                                <a href="#" class="flex items-center gap-1.5 text-sm font-bold text-linkedin-blue hover:underline">
                                    85 Applicants <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                                </a>
                            </td>
                            <td class="px-8 py-6">
                                <span class="rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-gray-500">Closed</span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end gap-3">
                                    <button class="text-gray-400 transition-colors hover:text-linkedin-blue"><i class="fa-solid fa-pen text-sm"></i></button>
                                    <button class="text-gray-400 transition-colors hover:text-rose-500"><i class="fa-solid fa-trash-can text-sm"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr class="group transition-colors hover:bg-gray-50/50">
                            <td class="px-8 py-6">
                                <div>
                                    <h3 class="text-base font-bold text-gray-900">Executive Assistant</h3>
                                    <p class="mt-0.5 text-[11px] font-medium uppercase tracking-wider text-gray-400">REQ-2024-112 - Operations</p>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-2 text-gray-600">
                                    <i class="fa-solid fa-location-dot text-xs text-gray-300"></i>
                                    <span class="text-sm font-medium">London, UK</span>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-sm font-medium text-gray-600">Full-time</td>
                            <td class="px-8 py-6">
                                <a href="#" class="flex items-center gap-1.5 text-sm font-bold text-linkedin-blue hover:underline">
                                    5 Applicants <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                                </a>
                            </td>
                            <td class="px-8 py-6">
                                <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-emerald-600">Active</span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end gap-3">
                                    <button class="text-gray-400 transition-colors hover:text-linkedin-blue"><i class="fa-solid fa-pen text-sm"></i></button>
                                    <button class="text-gray-400 transition-colors hover:text-rose-500"><i class="fa-solid fa-trash-can text-sm"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between border-t border-gray-100 bg-gray-50/30 px-8 py-4">
                <p class="text-xs font-medium text-gray-400">Showing 1-4 of 24 jobs</p>
                <div class="flex items-center gap-2">
                    <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-200 text-gray-400 transition-all hover:bg-white">
                        <i class="fa-solid fa-chevron-left text-[10px]"></i>
                    </button>
                    <button class="flex h-8 w-8 items-center justify-center rounded-lg bg-linkedin-blue text-xs font-bold text-white shadow-sm">1</button>
                    <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-transparent text-xs font-bold text-gray-500 transition-all hover:border-gray-200 hover:bg-white">2</button>
                    <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-transparent text-xs font-bold text-gray-500 transition-all hover:border-gray-200 hover:bg-white">3</button>
                    <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-200 text-gray-400 transition-all hover:bg-white">
                        <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid gap-8 lg:grid-cols-3">
            <div class="group relative overflow-hidden rounded-2xl bg-linkedin-blue p-8 text-white shadow-lg lg:col-span-1">
                <div class="relative z-10">
                    <p class="mb-2 text-[10px] font-bold uppercase tracking-widest text-blue-100">Hire Rate Efficiency</p>
                    <h2 class="mb-6 text-4xl font-bold">+14% vs Last Month</h2>
                    <div class="flex items-center gap-2 text-blue-100">
                        <i class="fa-solid fa-arrow-trend-up text-sm"></i>
                        <p class="text-xs font-medium">Closing time reduced to 18 days average.</p>
                    </div>
                </div>
                <div class="absolute -bottom-8 -right-8 h-32 w-32 rounded-full bg-white/10 blur-2xl"></div>
            </div>

            <div class="flex items-center gap-8 rounded-2xl border border-gray-100 bg-white p-8 shadow-sm lg:col-span-2">
                <div class="relative flex-shrink-0">
                    <svg class="h-24 w-24 -rotate-90 transform">
                        <circle cx="48" cy="48" r="40" stroke="currentColor" stroke-width="8" fill="transparent" class="text-gray-100"></circle>
                        <circle cx="48" cy="48" r="40" stroke="currentColor" stroke-width="8" fill="transparent" class="text-emerald-400" stroke-dasharray="251.2" stroke-dashoffset="45.2"></circle>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-2xl font-bold text-gray-900">82%</span>
                    </div>
                </div>
                <div>
                    <h3 class="mb-1 text-lg font-bold text-gray-900">Talent Quality Score</h3>
                    <p class="max-w-md text-sm font-medium leading-relaxed text-gray-500">
                        Your current job descriptions are attracting <span class="font-bold text-emerald-500">15% more highly-qualified</span> candidates than industry benchmarks.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function switchTab(type) {
            const tabs = ['all', 'active', 'draft', 'closed'];
            tabs.forEach(tab => {
                const el = document.getElementById('tab-' + tab);
                el.classList.remove('border-linkedin-lightBlue', 'text-linkedin-lightBlue');
                el.classList.add('border-transparent', 'text-gray-400');
            });

            const activeTab = document.getElementById('tab-' + type);
            activeTab.classList.remove('border-transparent', 'text-gray-400');
            activeTab.classList.add('border-linkedin-lightBlue', 'text-linkedin-lightBlue');
        }
    </script>
@endsection
