@extends('layouts.employer')
@section('title', 'Applicants')

@section('employer-content')
    <div class="space-y-8">
        <div>
            <h2 class="text-[1.5rem] font-bold tracking-tight text-slate-900">Post New Job</h2>
            <p class="mt-1 font-medium text-slate-500">Fill in the details below to create a new high-impact career
                opportunity.</p>
        </div>

        <div class="">
            <div class="rounded-[24px] border border-[#dbe5f4] bg-white shadow-[0_10px_30px_rgba(15,23,42,0.04)]">
                <div class="flex items-center gap-2 rounded-t-[24px] border-b border-[#e7edf7] px-5 py-4">
                    <span
                        class="flex h-5 w-5 items-center justify-center rounded-full border border-linkedin-blue/20 bg-linkedin-blue/10 text-[10px] text-linkedin-blue">
                        <i class="fa-regular fa-circle"></i>
                    </span>
                    <span class="text-sm font-bold text-linkedin-blue">Job Information</span>
                </div>

                <form action="{{ route('employer.post-new-job-store') }}" method="post"
                    class="space-y-6 px-5 py-5 sm:px-6 sm:py-6">
                    @csrf
                    <div class="grid gap-5 md:grid-cols-2">
                        <div class="space-y-2">
                            <label for="job-title" class="text-xs font-semibold text-slate-700">Job Title</label>
                            <div class="relative">

                                <input id="job-title" type="text" placeholder="e.g. Senior Software Architect"
                                    class="w-full rounded-xl border border-[#d4ddeb] bg-white px-4 py-3 text-sm text-slate-700 shadow-sm outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10 @error('title') !border-red-500 @enderror"
                                    value="{{ old('title') }}" name="title" @error('title') autofocus @enderror>
                                @error('title')
                                    <p class="text-red-500  text-xs">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="job-location" class="text-xs font-semibold text-slate-700">Job Location</label>
                            <div class="relative">

                                <input id="job-location" type="text" placeholder="London, UK or Remote"
                                    class="w-full rounded-xl border border-[#d4ddeb] bg-white py-3 pl-4 pr-4 text-sm text-slate-700 shadow-sm outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10 @error('location') !border-red-500 @enderror"
                                    value="{{ old('location') }}" name="location" @error('location') autofocus @enderror>
                                @error('location')
                                    <p class="text-red text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="job-category" class="text-xs font-semibold text-slate-700">Job Category</label>
                            <select id="job-category"
                                class="w-full rounded-xl border border-[#d4ddeb] bg-white px-4 py-3 text-sm text-slate-700 shadow-sm outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10 @error('category') !border-red-500 @enderror"
                                value="{{ old('category') }}" name="category" @error('category') autofocus @enderror>
                                <option value="engineering">Engineering</option>
                                <option value="design">Design</option>
                                <option value="marketing">Marketing</option>
                                <option value="operations">Operations</option>
                                <option value="developer">Developer</option>
                                <option value="teaching">Teaching</option>
                            </select>
                            @error('category')
                                <p class="text-red text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="employment-type" class="text-xs font-semibold text-slate-700">Employment
                                Type</label>
                            <select id="employment-type"
                                class="w-full rounded-xl border border-[#d4ddeb] bg-white px-4 py-3 text-sm text-slate-700 shadow-sm outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10 @error('type') !border-red-500 @enderror"
                                value="{{ old('type') }}" name="type" @error('type') autofous @enderror>
                                <option value="full-time">Full-time</option>
                                <option value="part-time">Part-time</option>
                                <option value="contract">Contract</option>
                                <option value="remote">Remote</option>
                            </select>
                            @error('type')
                                <p class="text-red text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="status" class="text-xs font-semibold text-slate-700">Status</label>
                            <div classs="relative">
                                <select id="status"
                                    class="w-full rounded-xl border border-[#d4ddeb] bg-white px-4 py-3 text-sm text-slate-700 shadow-sm outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10 @error('status') !border-red-500 @enderror"
                                    value="{{ old('status') }}" name="status" @error('status') autofocus @enderror>
                                    <option value="active">Active</option>
                                    <option value="closed">Expired</option>

                                </select>
                                @error('status')
                                    <p class="text-red text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="expire-at" class="text-xs font-semibold text-slate-700">Expire at</label>
                            <div class="relative">
                                <input id="expire-at" type="date"
                                    class="w-full rounded-xl border border-[#d4ddeb] bg-white px-4 py-3 text-sm text-slate-700 shadow-sm outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10 @error('expire_at') !border-red-500 @enderror"
                                    value="{{ old('expire_at') }}" name="expire_at"
                                    @error('expire_at') autofocus
                                @enderror>
                                @error('expire_at')
                                    <p class="text-red text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="experience" class="text-xs font-semibold text-slate-700">Experience</label>
                            <select id="experience"
                                class="w-full rounded-xl border border-[#d4ddeb] bg-white px-4 py-3 text-sm text-slate-700 shadow-sm outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10 @error('experience') !border-red-500 @enderror"
                                @error('experience') autofocus @enderror value="{{ old('experience') }}"
                                name="experience">
                                <option value="lead">Lead Level</option>
                                <option value="senior">Senior Level</option>
                                <option value="mid">Mid-level</option>
                                <option value="entry">Entry Level</option>
                            </select>
                            @error('experience')
                                <p class="text-red text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-4 border-t border-[#e7edf7] pt-6">
                        <h3 class="text-xs font-semibold text-slate-700">Compensation Range</h3>
                        <div class="grid gap-5 md:grid-cols-3">
                            <div class="space-y-2">
                                <label for="min-salary"
                                    class="text-[11px] font-semibold uppercase tracking-wide text-slate-400">Min
                                    Salary</label>
                                <input id="min-salary" type="text" 
                                    class="w-full rounded-xl border border-[#d4ddeb] bg-white px-4 py-3 text-sm text-slate-700 shadow-sm outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10"
                                    value="{{ old('salary-min') }}" name="salary-min">
                                @error('salary-min')
                                    <p class="text-red text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="space-y-2">
                                <label for="max-salary"
                                    class="text-[11px] font-semibold uppercase tracking-wide text-slate-400">Max
                                    Salary</label>
                                <input id="max-salary" type="text"
                                    class="w-full rounded-xl border border-[#d4ddeb] bg-white px-4 py-3 text-sm text-slate-700 shadow-sm outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10 @error('salary-max') !border-red-500 @enderror"
                                    name="salary-max" value="{{ old('salary-max') }}"
                                    @error('salary-max') autofocus @enderror>
                                @error('salary-max')
                                    <p class="text-red text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="space-y-2">
                                <label for="currency"
                                    class="text-[11px] font-semibold uppercase tracking-wide text-slate-400">Currency</label>
                                <select id="currency"
                                    class="w-full rounded-xl border border-[#d4ddeb] bg-white px-4 py-3 text-sm text-slate-700 shadow-sm outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10 @error('currency') !border-red-500 @enderror"
                                    @error('currency') autofocus @enderror value="{{ old('currency') }}"
                                    name="currency">
                                    <option value="usd">USD ($)</option>
                                    <option value="eur">EUR</option>
                                    <option value="gbp">GBP</option>
                                    <option value="inr">INR</option>
                                </select>
                                @error('currency')
                                    <p class="text-red text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="job-description" class="text-xs font-semibold text-slate-700">Job Description</label>
                        <div class="overflow-hidden rounded-xl border border-[#d4ddeb] bg-white shadow-sm">
                            <div
                                class="flex items-center gap-3 border-b border-[#e7edf7] bg-slate-50 px-4 py-2 text-xs text-slate-500">
                                <button type="button" class="font-bold transition hover:text-linkedin-blue">B</button>
                                <button type="button" class="italic transition hover:text-linkedin-blue">I</button>
                                <button type="button" class="transition hover:text-linkedin-blue">
                                    <i class="fa-solid fa-list"></i>
                                </button>
                                <button type="button" class="transition hover:text-linkedin-blue">
                                    <i class="fa-solid fa-link"></i>
                                </button>
                            </div>
                            <textarea id="job-description" rows="6"
                                placeholder="Describe the core mission, responsibilities, and team culture..."
                                class="w-full resize-none border-0 px-4 py-3 text-sm text-slate-700 outline-none placeholder:text-slate-400 focus:ring-0"
                                name="description" @error('description') autofocus
                                @enderror>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="job-responsibilities" class="text-xs font-semibold text-slate-700">Job
                            Responsibilities</label>
                        <div class="overflow-hidden rounded-xl border border-[#d4ddeb] bg-white shadow-sm">
                            <div
                                class="flex items-center gap-3 border-b border-[#e7edf7] bg-slate-50 px-4 py-2 text-xs text-slate-500">
                                <button type="button" class="font-bold transition hover:text-linkedin-blue">B</button>
                                <button type="button" class="italic transition hover:text-linkedin-blue">I</button>
                                <button type="button" class="transition hover:text-linkedin-blue">
                                    <i class="fa-solid fa-list"></i>
                                </button>
                                <button type="button" class="transition hover:text-linkedin-blue">
                                    <i class="fa-solid fa-link"></i>
                                </button>
                            </div>
                            <textarea id="job-responsibilities" rows="6"
                                placeholder="Describe the core mission, responsibilities, and team culture..."
                                class="w-full resize-none border-0 px-4 py-3 text-sm text-slate-700 outline-none placeholder:text-slate-400 focus:ring-0"
                                name="responsibilities">{{ old('responsibilities') }}</textarea>
                            @error('responsibilities')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="key-requirements" class="text-xs font-semibold text-slate-700">Key
                            Requirements</label>
                        <div class="overflow-hidden rounded-xl border border-[#d4ddeb] bg-white shadow-sm">
                            <div
                                class="flex items-center gap-3 border-b border-[#e7edf7] bg-slate-50 px-4 py-2 text-xs text-slate-500">
                                <button type="button" class="font-bold transition hover:text-linkedin-blue">B</button>
                                <button type="button" class="italic transition hover:text-linkedin-blue">I</button>
                                <button type="button" class="transition hover:text-linkedin-blue">
                                    <i class="fa-solid fa-list"></i>
                                </button>
                            </div>
                            <textarea id="key-requirements" rows="5"
                                placeholder="List required skills, experience, and educational background..."
                                class="w-full resize-none border-0 px-4 py-3 text-sm text-slate-700 outline-none placeholder:text-slate-400 focus:ring-0"
                                name="requirements">{{ old('requirements') }}</textarea>
                            @error('requirements')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="benefits" class="text-xs font-semibold text-slate-700">Benefits</label>
                        <div class="overflow-hidden rounded-xl border border-[#d4ddeb] bg-white shadow-sm">
                            <div
                                class="flex items-center gap-3 border-b border-[#e7edf7] bg-slate-50 px-4 py-2 text-xs text-slate-500">
                                <button type="button" class="font-bold transition hover:text-linkedin-blue">B</button>
                                <button type="button" class="italic transition hover:text-linkedin-blue">I</button>
                                <button type="button" class="transition hover:text-linkedin-blue">
                                    <i class="fa-solid fa-list"></i>
                                </button>
                                <button type="button" class="transition hover:text-linkedin-blue">
                                    <i class="fa-solid fa-link"></i>
                                </button>
                            </div>
                            <textarea id="benefits" rows="6" placeholder="Describe the benefits..."
                                class="w-full resize-none border-0 px-4 py-3 text-sm @error('benefits') !border-red-500 @enderror text-slate-700 outline-none placeholder:text-slate-400 focus:ring-0"
                                name="benefits" @error('benefits') autofocus
                                @enderror>{{ old('benefits') }}</textarea>
                            @error('benefits')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div
                        class="flex flex-col gap-3 border-t border-[#e7edf7] pt-5 sm:flex-row sm:items-center sm:justify-between">
                        <button type="button"
                            class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-slate-700">
                            <i class="fa-regular fa-trash-can text-xs"></i>
                            Discard Changes
                        </button>
                        <div class="flex flex-col gap-3 sm:flex-row">
                            <button type="button"
                                class="rounded-xl border border-[#d4ddeb] bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:border-slate-300 hover:bg-slate-50"
                                value="draft">Save Draft</button>
                            <button type="submit"
                                class="rounded-xl bg-linkedin-blue px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-linkedin-darkBlue">Publish
                                Job</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
