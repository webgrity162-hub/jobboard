@extends('layouts.employer')
@section('title', $applicant->user->name)

@section('employer-content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
            <div>
                <a href="{{ route('employer.applicants') }}"
                    class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.18em] text-slate-400 transition hover:text-slate-600">
                    <i class="fa-solid fa-arrow-left text-[10px]"></i>
                    Back to Applicants
                </a>
                <h1 class="mt-3 text-[2rem] font-bold tracking-tight text-slate-900">Candidate Detail</h1>
                <p class="mt-1 text-sm text-slate-500">Review application details and collaborate with your team.</p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <button type="button"
                    class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:border-slate-300 hover:bg-slate-50">
                    Schedule Interview
                </button>
                <button type="button"
                    class="inline-flex items-center gap-2 rounded-xl bg-linkedin-blue px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-linkedin-darkBlue">
                    <i class="fa-solid fa-briefcase text-xs"></i>
                    Make Offer
                </button>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[280px_minmax(0,1fr)]">
            <aside
                class="space-y-5 rounded-[28px] border border-[#dbe5f4] bg-white p-5 shadow-[0_18px_45px_rgba(15,23,42,0.06)]">
                <div class="text-center">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($applicant->user['name']) }}&background=0a66c2&color=fff&size=128"
                        alt="{{ $applicant->user['name'] }}"
                        class="mx-auto h-24 w-24 rounded-full border-4 border-[#edf3ff] shadow-sm">
                    <h2 class="mt-4 text-xl font-bold text-slate-900">{{ $applicant['name'] }}</h2>
                    <p class="mt-1 text-sm text-slate-500">{{ $applicant['company'] }}</p>
                    <span
                        class="mt-3 inline-flex rounded-full px-3 py-1 text-[11px] font-bold uppercase tracking-wide {{ $applicant['status_class'] }}">
                        {{ $applicant['status'] }}
                    </span>
                </div>

                <div class="space-y-4 border-t border-[#ecf1f8] pt-5">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400">Contact</p>
                        <div class="mt-3 space-y-2 text-sm text-slate-600">
                            <p class="flex items-center gap-2">
                                <i class="fa-regular fa-envelope text-slate-400"></i>
                                <span class="break-all">{{ $applicant->user['email'] }}</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <i class="fa-solid fa-phone text-slate-400"></i>
                                <span>{{ $applicant->user['phone'] }}</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <i class="fa-solid fa-location-dot text-slate-400"></i>
                                <span>{{ $applicant->user['location'] ?? 'Kolkata' }}</span>
                            </p>
                        </div>
                    </div>

                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400">Education</p>
                        <p class="mt-3 text-sm font-semibold text-slate-800">{{ $applicant['university'] ?? '' }}</p>
                    </div>

                    {{-- <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400">Skills</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                            @foreach ($applicant['skills'] as $skill)
                            <span class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">{{ $skill
                                }}</span>
                            @endforeach
                        </div>
                    </div> --}}
                </div>

                <a href="{{ route('resume.download', ['filename' => $applicant->resume]) }}" type="button"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-linkedin-blue/20 bg-linkedin-blue/5 px-4 py-3 text-sm font-semibold text-linkedin-blue transition hover:bg-linkedin-blue/10">
                    <i class="fa-solid fa-download text-xs"></i>
                    Download Resume
                </a>
            </aside>

            <div class="space-y-6">
                <section class="rounded-[28px] border border-[#dbe5f4] bg-white shadow-[0_18px_45px_rgba(15,23,42,0.06)]">
                    <div
                        class="flex flex-col gap-4 border-b border-[#ecf1f8] px-5 py-5 sm:px-6 lg:flex-row lg:items-center lg:justify-between">
                        <div class="flex flex-wrap items-center gap-3">
                            <span
                                class="inline-flex items-center gap-2 rounded-xl bg-[#edf4ff] px-3 py-2 text-sm font-semibold text-linkedin-blue">
                                <i class="fa-solid fa-star text-[10px]"></i>
                                {{ $applicant['match'] ?? "test k"}}
                            </span>
                            <span
                                class="inline-flex rounded-xl border border-[#dbe5f4] bg-white px-3 py-2 text-sm font-semibold text-slate-600">
                                {{ $applicant->companyJob['title'] ?? "software " }}
                            </span>
                        </div>

                        <div class="w-full lg:w-52">
                            <select id="status-select"
                                class="w-full appearance-none rounded-xl border border-[#d6deeb] bg-[#f9fbff] px-4 py-3 text-sm font-semibold text-slate-600 outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10" data-current="{{ $applicant->status }}">

                                @foreach(['pending', 'reviewing', 'shortlisted', 'interviewing', 'rejected', 'hired'] as $status)
                                    <option value="{{ $status }}" {{ $applicant->status === $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="px-5 py-5 sm:px-6">
                        <div class="rounded-[22px] border border-[#e4ebf6] bg-[#fbfcfe] p-5">
                            <h3 class="text-sm font-bold text-slate-900">Cover Letter</h3>
                            <div class="mt-4 space-y-4 text-sm leading-7 text-slate-600">
                                @if (!empty($applicant['cover_letter']))
                                    <p>{{ $applicant['cover_letter'] }}</p>
                                @else
                                    <p>No cover letter has been uploaded for this candidate yet.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>

                <section class="rounded-[28px] border border-[#dbe5f4] bg-white shadow-[0_18px_45px_rgba(15,23,42,0.06)]">
                    <div class="flex items-center justify-between border-b border-[#ecf1f8] px-5 py-4 sm:px-6">
                        <div class="flex items-center gap-2">
                            <span
                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#edf4ff] text-linkedin-blue">
                                <i class="fa-regular fa-note-sticky text-sm"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Team Notes</h3>
                                <p class="text-xs text-slate-400">Leave feedback and keep everyone aligned.</p>
                            </div>
                        </div>
                        <button type="button"
                            class="text-sm font-semibold text-linkedin-blue transition hover:text-linkedin-darkBlue">Add
                            note</button>
                    </div>

                    <div class="space-y-4 px-5 py-5 sm:px-6">
                        <div class="rounded-[22px] border border-[#e4ebf6] bg-[#fbfcfe] p-4">
                            <div class="flex gap-3">
                                <span
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-slate-900 text-xs font-bold text-white">A</span>
                                <div class="min-w-0 flex-1">
                                    <textarea rows="3" placeholder="Add a note for the hiring team..."
                                        class="w-full resize-none rounded-xl border border-[#d6deeb] bg-white px-4 py-3 text-sm text-slate-600 outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10"></textarea>
                                    <div class="mt-3 flex justify-end">
                                        <button type="button"
                                            class="rounded-xl bg-linkedin-blue px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-linkedin-darkBlue">
                                            Add Note
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($applicant['notes'] ?? [] as $note)
                            <article class="rounded-[22px] border border-[#e4ebf6] p-4 {{ $note['color'] }}">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="flex items-start gap-3">
                                        <span
                                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-white/80 text-xs font-bold text-slate-800">
                                            {{ strtoupper(substr($note['author'], 0, 1)) }}
                                        </span>
                                        <div>
                                            <div class="flex flex-wrap items-center gap-2">
                                                <h4 class="text-sm font-bold">{{ $note['author'] }}</h4>
                                                <span class="text-xs opacity-70">{{ $note['role'] }}</span>
                                            </div>
                                            <p class="mt-2 text-sm leading-6">{{ $note['text'] }}</p>
                                        </div>
                                    </div>
                                    <span class="shrink-0 text-xs opacity-70">{{ $note['time'] }}</span>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>



    <script>
        function displayToast(message, type = 'success') {
            const container = document.getElementById('toast-container') || createToastContainer();
            
            const toastElement = document.createElement('div');
            toastElement.className = 'toast-notification flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-xl border-l-4 transform transition-all duration-300 translate-x-full opacity-0';
            toastElement.className += type === 'success' ? ' border-green-500' : ' border-red-500';
            
            const iconClass = type === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation';
            const iconBgClass = type === 'success' ? 'text-green-500 bg-green-100' : 'text-red-500 bg-red-100';
            
            toastElement.innerHTML = `
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 ${iconBgClass} rounded-lg">
                    <i class="fa-solid ${iconClass}"></i>
                </div>
                <div class="ml-3 text-sm font-normal">${message}</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" onclick="closeToast(this)">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            `;
            
            container.appendChild(toastElement);
            showToast(toastElement);
        }

        function createToastContainer() {
            const container = document.createElement('div');
            container.id = 'toast-container';
            container.className = 'fixed top-5 right-5 z-[9999] flex flex-col gap-3';
            document.body.appendChild(container);
            return container;
        }

        document.getElementById('status-select').addEventListener('change', function () {
            const newStatus = this.value;
            const applicationId = {{ $applicant->id }};
            const self = this;
                fetch(`/employer/applications/${applicationId}/status`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ status: newStatus })
                }).then(response => response.json())
                .then(data => {
                    if (data.success) {
             
                         displayToast(data.message, 'success');
                            // Update the current status data attribute for future changes
                                self.setAttribute('data-current', newStatus);

                    } else {
                     
                         displayToast(data.message, 'error');
                            // Revert the select to previous value if update failed
                            self.value = self.getAttribute('data-current');
                            
                    }
                })
        })

    </script>

@endsection