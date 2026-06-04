@extends('layouts.candidate')

@section('title', 'My Applications | JobConnect')

@section('candidate-content')
    <div class="space-y-6">
        <!-- My Applications Header -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <h1 class="text-xl font-bold mb-2">My Applications</h1>
            <p class="text-sm text-gray-500">Track and manage your recent job applications</p>
        </div>

        <!-- Applications List -->
        <div class="bg-white rounded-lg border border-gray-200 shadow-sm divide-y divide-gray-100">
            <!-- Application Item -->
            @foreach($applications as $application)
            <div class="p-6 hover:bg-gray-50 transition flex justify-between items-start gap-4 relative group/item">
                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-md flex items-center justify-center text-linkedin-blue font-bold text-xl">{{ $application->companyJob->title[0] }}</div>
                    <div>
                        <h3 class="font-bold text-lg hover:text-linkedin-blue hover:underline cursor-pointer">{{ $application->companyJob->title }}</h3>
                        <p class="text-sm text-gray-600">{{ $application->companyJob->company->name }} • {{ $application->companyJob->location }}</p>
                        <div class="mt-2 flex items-center gap-2 text-xs text-gray-500">
                            @php
                                $statusClasses = [
                                    'pending' => 'bg-yellow-100 text-yellow-700',
                                    'reviewing' => 'bg-blue-100 text-blue-700',
                                    'shortlisted' => 'bg-purple-100 text-purple-700',
                                    'rejected' => 'bg-red-100 text-red-700',
                                    'hired' => 'bg-green-100 text-green-700',
                                ];
                                $statusLabels = [
                                    'pending' => 'Applied',
                                    'reviewing' => 'In Review',
                                    'shortlisted' => 'Shortlisted',
                                    'rejected' => 'Rejected',
                                    'hired' => 'Hired',
                                ];
                                $currentStatus = $application->status ?? 'pending';
                            @endphp
                            <span class="{{ $statusClasses[$currentStatus] ?? 'bg-gray-100 text-gray-700' }} px-2 py-0.5 rounded font-bold">
                                {{ $statusLabels[$currentStatus] ?? ucfirst($currentStatus) }}
                            </span>
                            <span>{{ $application->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                <div class="text-right flex flex-col items-end gap-2">
                    <div class="relative">
                        <button onclick="toggleDropdown(event, 'dropdown-{{ $application->id }}')" class="text-gray-400 hover:text-gray-600 p-1 rounded-full hover:bg-gray-100 transition">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                        <!-- Dropdown Menu -->
                        <div id="dropdown-{{ $application->id }}" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-200 z-10 py-1">
                            <a href="{{ route('candidate.jobs.show', $application->company_job_id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center gap-2">
                                <i class="fa-solid fa-eye text-gray-400"></i> View Job
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center gap-2">
                                <i class="fa-solid fa-download text-gray-400"></i> Download Resume
                            </a>
                            <div class="border-t border-gray-100"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 flex items-center gap-2">
                                <i class="fa-solid fa-trash-can text-red-400"></i> Withdraw
                            </a>
                        </div>
                    </div>
                    <button onclick="openStatusModal('{{ $application->companyJob->title }}', '{{ $application->companyJob->company->name }}', '{{ $application->status }}')" class="text-xs font-bold text-linkedin-blue hover:underline">Review status</button>
                </div>
            </div>
            @endforeach
            @if($applications->isEmpty())
                <div class="p-6 text-center text-gray-500">No applications found.</div>
            @endif
        </div>

        <!-- Application Status Modal -->
        <div id="statusModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[100] flex items-center justify-center px-4">
            <div class="bg-white rounded-lg w-full max-w-lg overflow-hidden shadow-2xl animate-in fade-in zoom-in duration-200">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-xl">Application Status</h3>
                    <button onclick="closeStatusModal()" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-4 mb-8">
                        <div id="modalLogo" class="w-16 h-16 bg-blue-50 rounded-lg flex items-center justify-center text-linkedin-blue font-bold text-2xl"></div>
                        <div>
                            <h4 id="modalJobTitle" class="font-bold text-lg"></h4>
                            <p id="modalCompany" class="text-sm text-gray-500"></p>
                        </div>
                    </div>
                    
                    <div class="relative pl-8 space-y-8 before:content-[''] before:absolute before:left-3 before:top-2 before:bottom-2 before:w-0.5 before:bg-gray-200">
                        <!-- Step 1 -->
                        <div class="relative">
                            <div class="absolute -left-8 top-1 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center border-4 border-white">
                                <i class="fa-solid fa-check text-white text-[10px]"></i>
                            </div>
                            <p class="font-bold text-sm">Applied</p>
                            <p class="text-xs text-gray-500">Your application has been successfully submitted.</p>
                        </div>
                        <!-- Step 2 -->
                        <div class="relative">
                            <div id="dot-reviewing" class="absolute -left-8 top-1 w-6 h-6 bg-gray-200 rounded-full border-4 border-white flex items-center justify-center"></div>
                            <p id="text-reviewing" class="font-bold text-sm text-gray-400 transition-colors">In Review</p>
                            <p class="text-xs text-gray-500">The hiring team is currently reviewing your profile.</p>
                        </div>
                        <!-- Step 3 -->
                        <div class="relative">
                            <div id="dot-shortlisted" class="absolute -left-8 top-1 w-6 h-6 bg-gray-200 rounded-full border-4 border-white flex items-center justify-center"></div>
                            <p id="text-shortlisted" class="font-bold text-sm text-gray-400 transition-colors">Shortlisted</p>
                            <p class="text-xs text-gray-500">You've been shortlisted for an interview!</p>
                        </div>
                        <!-- Final Step (Conditional Rejected) -->
                        <div id="step-rejected" class="relative hidden">
                            <div class="absolute -left-8 top-1 w-6 h-6 bg-red-500 rounded-full border-4 border-white flex items-center justify-center text-white">
                                <i class="fa-solid fa-xmark text-[10px]"></i>
                            </div>
                            <p class="font-bold text-sm text-red-600">Application Rejected</p>
                            <p class="text-xs text-gray-500">Unfortunately, the company decided not to proceed with your application.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 flex justify-end">
                    <button onclick="closeStatusModal()" class="bg-linkedin-blue text-white px-6 py-2 rounded-full font-bold hover:bg-linkedin-darkBlue transition">Got it</button>
                </div>
            </div>
        </div>

        <script>
            function toggleDropdown(event, id) {
                event.stopPropagation();
                const dropdown = document.getElementById(id);
                const allDropdowns = document.querySelectorAll('[id^="dropdown-"]');
                
                allDropdowns.forEach(d => {
                    if (d.id !== id) d.classList.add('hidden');
                });
                
                dropdown.classList.toggle('hidden');
            }

            function openStatusModal(job, company, status) {
                document.getElementById('modalJobTitle').textContent = job;
                document.getElementById('modalCompany').textContent = company;
                document.getElementById('modalLogo').textContent = company.charAt(0);
                
                // Reset steps
                const dotReviewing = document.getElementById('dot-reviewing');
                const textReviewing = document.getElementById('text-reviewing');
                const dotShortlisted = document.getElementById('dot-shortlisted');
                const textShortlisted = document.getElementById('text-shortlisted');
                const stepRejected = document.getElementById('step-rejected');

                // Helper to set step active
                const setStepActive = (dot, text) => {
                    dot.className = 'absolute -left-8 top-1 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center border-4 border-white';
                    dot.innerHTML = '<i class="fa-solid fa-check text-white text-[10px]"></i>';
                    text.classList.remove('text-gray-400');
                    text.classList.add('text-gray-900');
                };

                const setStepInactive = (dot, text) => {
                    dot.className = 'absolute -left-8 top-1 w-6 h-6 bg-gray-200 rounded-full border-4 border-white flex items-center justify-center';
                    dot.innerHTML = '';
                    text.classList.remove('text-gray-900');
                    text.classList.add('text-gray-400');
                };

                setStepInactive(dotReviewing, textReviewing);
                setStepInactive(dotShortlisted, textShortlisted);
                stepRejected.classList.add('hidden');

                if (status === 'reviewing') {
                    setStepActive(dotReviewing, textReviewing);
                } else if (status === 'shortlisted' || status === 'hired') {
                    setStepActive(dotReviewing, textReviewing);
                    setStepActive(dotShortlisted, textShortlisted);
                } else if (status === 'rejected') {
                    stepRejected.classList.remove('hidden');
                }
                
                document.getElementById('statusModal').classList.remove('hidden');
            }

            function closeStatusModal() {
                document.getElementById('statusModal').classList.add('hidden');
            }

            // Close dropdowns when clicking outside
            document.addEventListener('click', () => {
                const allDropdowns = document.querySelectorAll('[id^="dropdown-"]');
                allDropdowns.forEach(d => d.classList.add('hidden'));
            });
        </script>

        <!-- Recommended Jobs -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold">Recommended for you</h2>
                <a href="{{ route('candidate.jobs.index') }}" class="text-sm text-linkedin-blue font-bold hover:underline">See all jobs</a>
            </div>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="border border-gray-100 rounded-lg p-4 hover:border-linkedin-blue transition cursor-pointer">
                    <h4 class="font-bold text-sm">React Developer</h4>
                    <p class="text-xs text-gray-500">Meta • Remote</p>
                    <button class="mt-3 text-xs font-bold text-linkedin-blue border border-linkedin-blue px-3 py-1 rounded-full hover:bg-blue-50">Easy Apply</button>
                </div>
                <div class="border border-gray-100 rounded-lg p-4 hover:border-linkedin-blue transition cursor-pointer">
                    <h4 class="font-bold text-sm">Backend Engineer</h4>
                    <p class="text-xs text-gray-500">Netflix • Los Gatos, CA</p>
                    <button class="mt-3 text-xs font-bold text-linkedin-blue border border-linkedin-blue px-3 py-1 rounded-full hover:bg-blue-50">Easy Apply</button>
                </div>
            </div>
        </div>
    </div>
@endsection
