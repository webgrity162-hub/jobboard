@extends('layouts.employer')
@section('title', 'Company Profile')

@section('employer-content')
    <div class="space-y-6">
        <div>
            <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">Company Profile</p>
            <h1 class="mt-2 text-[2rem] font-bold tracking-tight text-slate-900">Company Profile</h1>
            <p class="mt-1 text-sm text-slate-500">Manage your organization's public identity and internal details.</p>
        </div>

        <section class="rounded-[24px] border border-[#dbe5f4] bg-white shadow-[0_14px_38px_rgba(15,23,42,0.05)]">
            <form method="POST" action="{{ route('employer.company.update') }}" class="space-y-8 p-5 sm:p-6">
                @csrf

                @method('PATCH')
                <div class="flex flex-col gap-5 border-b border-[#e8eef8] pb-6 lg:flex-row lg:items-start">
                    <div class="flex h-28 w-28 shrink-0 items-center justify-center rounded-2xl border border-dashed border-[#d7e0ed] bg-[#f7f9fd]">
                        @if ($profile['logo'])
                            <img src="{{ $profile['logo'] }}" alt="{{ $profile['name'] }}" class="h-20 w-20 rounded-xl object-contain">
                        @else
                            <div class="text-center text-slate-400">
                                <i class="fa-regular fa-image text-xl"></i>
                                <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide">Add Logo</p>
                            </div>
                        @endif
                    </div>

                    <div class="flex-1">
                        <h2 class="text-sm font-bold text-slate-900">Company Branding</h2>
                        <p class="mt-1 text-sm text-slate-500">Upload your company logo. Professional high-resolution PNG or SVG preferred. Max size 2MB.</p>

                        <div class="mt-4 flex flex-wrap items-center gap-3">
                          
                            <button type="button" class="rounded-xl bg-linkedin-blue px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-linkedin-darkBlue">
                                Upload New
                            </button>
                        </div>
                    </div>
                </div>

                <div class="grid gap-5 md:grid-cols-2">
                    <div class="space-y-2">
                        <label for="company-name" class="text-xs font-semibold text-slate-700">Company Name</label>
                        <input id="company-name" type="text" value="{{ $profile['name'] }}" class="w-full rounded-xl border border-[#d6deeb] bg-[#f9fbff] px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10">
                    </div>

                    <div class="space-y-2">
                        <label for="industry" class="text-xs font-semibold text-slate-700">Industry</label>
                        <div class="relative">
                            <select id="industry" class="w-full appearance-none rounded-xl border border-[#d6deeb] bg-[#f9fbff] px-4 py-3 pr-10 text-sm text-slate-700 outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10">
                                <option selected>{{ $profile['industry'] }}</option>
                                <option>Technology & Software</option>
                                <option>Financial Services</option>
                                <option>Healthcare</option>
                                <option>Education</option>
                            </select>
                            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400">
                                <i class="fa-solid fa-chevron-down text-[10px]"></i>
                            </span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="website" class="text-xs font-semibold text-slate-700">Website URL</label>
                        <input id="website" type="url" value="{{ $profile['website'] }}" class="w-full rounded-xl border border-[#d6deeb] bg-[#f9fbff] px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10">
                    </div>

                    <div class="space-y-2">
                        <label for="headquarters" class="text-xs font-semibold text-slate-700">Headquarters</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                <i class="fa-solid fa-location-dot text-xs"></i>
                            </span>
                            <input id="headquarters" type="text" value="{{ $profile['headquarters'] }}" class="w-full rounded-xl border border-[#d6deeb] bg-[#f9fbff] py-3 pl-10 pr-4 text-sm text-slate-700 outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10">
                        </div>
                    </div>

                    <div class="space-y-2 md:max-w-[280px]">
                        <label for="employee-count" class="text-xs font-semibold text-slate-700">Employee Count</label>
                        <div class="relative">
                            <select id="employee-count" class="w-full appearance-none rounded-xl border border-[#d6deeb] bg-[#f9fbff] px-4 py-3 pr-10 text-sm text-slate-700 outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10">
                                <option selected>{{ $profile['size'] }}</option>
                                <option>1-10 employees</option>
                                <option>11-50 employees</option>
                                <option>51-200 employees</option>
                                <option>201-500 employees</option>
                                <option>500+ employees</option>
                            </select>
                            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400">
                                <i class="fa-solid fa-chevron-down text-[10px]"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="space-y-2 border-t border-[#e8eef8] pt-6">
                    <div class="flex items-center justify-between gap-3">
                        <label for="company-description" class="text-xs font-semibold text-slate-700">Company Description</label>
                        <span class="text-[11px] font-medium text-slate-400">Max 320/2000</span>
                    </div>
                    <textarea id="company-description" rows="8" class="w-full rounded-2xl border border-[#d6deeb] bg-[#f9fbff] px-4 py-4 text-sm leading-7 text-slate-700 outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10">{{ $profile['description'] }}</textarea>
                </div>

                <div class="flex flex-col gap-3 border-t border-[#e8eef8] pt-5 sm:flex-row sm:items-center sm:justify-end">
                    <button type="button" class="rounded-xl border border-[#d6deeb] bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:border-slate-300 hover:bg-slate-50">
                        Discard Changes
                    </button>
                    <button type="submit" class="rounded-xl bg-linkedin-blue px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-linkedin-darkBlue">
                        Save Changes
                    </button>
                </div>
            </form>
        </section>

        <div class="flex flex-col gap-3 text-xs text-slate-500 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex flex-wrap items-center gap-4">
                <span class="inline-flex items-center gap-2">
                    <span class="flex h-5 w-5 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                        <i class="fa-solid fa-check text-[10px]"></i>
                    </span>
                    {{ $profile['verified'] ? 'Verified Organization' : 'Verification Pending' }}
                </span>
                <span class="inline-flex items-center gap-2">
                    <i class="fa-regular fa-clock text-slate-400"></i>
                    Last updated: {{ $profile['last_updated'] }}
                </span>
            </div>

            <a href="{{ $profile['public_url'] }}" class="inline-flex items-center gap-1.5 font-semibold text-linkedin-blue transition hover:text-linkedin-darkBlue">
                View Public Profile
                <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
            </a>
        </div>
    </div>
@endsection
