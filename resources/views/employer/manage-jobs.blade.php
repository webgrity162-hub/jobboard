@extends('layouts.employer')
@section('title', 'Manage Jobs | TalentStream')

@section('employer-content')
    <div class="space-y-8">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Job Management</h1>
                <p class="mt-1 font-medium text-gray-500">Oversee your active listings and track candidate pipelines.</p>
            </div>
            <a href="{{ route('employer.post.new.job') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-linkedin-blue px-6 py-2.5 font-bold text-white shadow-sm transition-all hover:bg-linkedin-darkBlue">
                <i class="fa-solid fa-plus text-xs"></i>
                Post New Job
            </a>
        </div>


        
            <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">
            <div class="overflow-x-auto border-b border-gray-200 bg-linkedin-blue px-6">
                <div class="flex min-w-max gap-8">
                    <button onclick="switchTab('all')" id="tab-all" class="flex items-center gap-2 border-b-2 border-linkedin-lightBlue py-4 text-sm font-bold text-linkedin-lightBlue transition-all">
                        All Jobs <span class="rounded-full bg-white font-weight-bold px-2 py-0.5 text-[12px] text-linkedin-blue">{{ $counts['all'] }}</span>
                    </button>
                    <button onclick="switchTab('active')" id="tab-active" class="flex items-center gap-2 border-b-2 border-transparent py-4 text-sm font-bold text-linkedin-lightBlue transition-all hover:text-linkedin-darkBlue">
                        Active <span class="rounded-full bg-white font-weight-bold px-2 py-0.5 text-[12px] text-linkedin-blue">{{ $counts['active'] }}</span>
                    </button>
                    <button onclick="switchTab('draft')" id="tab-draft" class="flex items-center gap-2 border-b-2 border-transparent py-4 text-sm font-bold text-linkedin-lightBlue transition-all hover:text-linkedin-darkBlue">
                        Draft <span class="rounded-full bg-white font-weight-bold px-2 py-0.5 text-[12px] text-linkedin-blue">{{ $counts['draft'] }}</span>
                    </button>
                    <button onclick="switchTab('closed')" id="tab-closed" class="flex items-center gap-2 border-b-2 border-transparent py-4 text-sm font-bold text-linkedin-lightBlue transition-all hover:text-linkedin-darkBlue">
                        Closed <span class="rounded-full bg-white font-weight-bold px-2 py-0.5 text-[12px] text-linkedin-blue">{{ $counts['closed'] }}</span>
                    </button>
                </div>
            </div>
            <div id="jobs-container">
            @include('employer.partials.jobs-table', ['jobs' => $jobs])
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
                        <circle cx="48" cy="48" r="40" stroke="currentColor" stroke-width="8" fill="transparent"
                            class="text-gray-100"></circle>
                        <circle cx="48" cy="48" r="40" stroke="currentColor" stroke-width="8" fill="transparent"
                            class="text-emerald-400" stroke-dasharray="251.2" stroke-dashoffset="45.2"></circle>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-2xl font-bold text-gray-900">82%</span>
                    </div>
                </div>
                <div>
                    <h3 class="mb-1 text-lg font-bold text-gray-900">Talent Quality Score</h3>
                    <p class="max-w-md text-sm font-medium leading-relaxed text-gray-500">
                        Your current job descriptions are attracting <span class="font-bold text-emerald-500">15% more
                            highly-qualified</span> candidates than industry benchmarks.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <x-delete-modal title="Delete job" />

     
<script>
        let currentTab = new URLSearchParams(window.location.search).get('status') || 'all';

        document.addEventListener('DOMContentLoaded', function () {
            updateActiveTab(currentTab);
        });

        function switchTab(tab) {
            currentTab = tab;

            updateActiveTab(tab);
            fetchJobs(tab);
        }

        function updateActiveTab(tab) {
            ['all', 'active', 'draft', 'closed'].forEach(t => {
                const btn = document.getElementById(`tab-${t}`);
                if (t === tab) {
                    btn.classList.add('border-linkedin-lightBlue');
                    btn.classList.remove('border-transparent');
                } else {
                    btn.classList.remove('border-linkedin-lightBlue');
                    btn.classList.add('border-transparent');
                }
            });
        }

        function fetchJobs(status = 'all', page = 1) {
            const params = new URLSearchParams({
                status,
                page,
            });

            fetch(`/employer/manage-jobs?${params.toString()}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('jobs-container').innerHTML = html;

                    const url = new URL(window.location);
                    if (status === 'all') {
                        url.searchParams.delete('status');
                    } else {
                        url.searchParams.set('status', status);
                    }

                    if (page > 1) {
                        url.searchParams.set('page', page);
                    } else {
                        url.searchParams.delete('page');
                    }

                    window.history.replaceState({}, '', url);
                });
        }

        document.addEventListener('click', function(e) {
            const link = e.target.closest('#jobs-pagination-links a');
            if (!link) return;

            e.preventDefault();

            const url = new URL(link.href);
            fetchJobs(currentTab, url.searchParams.get('page') || 1);
        });
    </script>
@endsection
