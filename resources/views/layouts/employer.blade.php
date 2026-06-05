@extends('layouts.app')

@section('navbar')
    <!-- This layout uses a custom sidebar and top nav, so we override the standard navbar -->
@endsection

@section('content')
    <div class="flex min-h-screen bg-[#f8faff]">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#f0f2ff] border-r border-gray-200 flex flex-col fixed h-full z-50">
            <!-- Brand -->
            <div class="p-4">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-linkedin-blue flex items-center  gap-2">
                    <span class="bg-linkedin-blue text-white p-1 rounded flex shadow-sm">
                        <i class="fa-solid fa-briefcase text-sm"></i>
                    </span>
                    JobBoard
                </a>
            </div>

            <!-- User Profile Card -->
            <div class="px-4 mb-6">
                <div class="bg-white/50 p-3 rounded-xl border border-white/60 flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0a66c2&color=fff"
                        class="w-10 h-10 rounded-lg shadow-sm" alt="Profile">
                    <div class="overflow-hidden">
                        <p class="font-bold text-sm text-gray-900 truncate">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] text-gray-500 font-medium truncate">{{ auth()->user()->role ?? 'Recruiter' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-grow px-4 space-y-1">
                <a href="{{ route('employer.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 {{ request()->routeIs('employer.dashboard') ? 'bg-[#3b4468] text-white shadow-md' : 'text-gray-500 hover:bg-white/50' }}">
                    <i class="fa-solid fa-chart-pie w-5"></i>
                    Overview
                </a>
                <a href="{{ route('employer.manageJobs') }}"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 {{ request()->routeIs('employer.manageJobs') ? 'bg-[#3b4468] text-white shadow-md' : 'text-gray-500 hover:bg-white/50' }}">
                    <i class="fa-solid fa-briefcase w-5"></i>
                    Job Management
                </a>
                <a href="{{ route('employer.post.new.job') }}"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 {{ request()->routeIs('employer.post.new.job') ? 'bg-white/60 text-linkedin-blue' : 'text-gray-500 hover:bg-white/50' }}">
                    <i class="fa-solid fa-circle-plus w-5"></i>
                    Post a Job
                </a>
                <a href="{{ route('employer.applicants') }}"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 {{ request()->routeIs('employer.applicants*') ? 'bg-[#3b4468] text-white shadow-md' : 'text-gray-500 hover:bg-white/50' }}">
                    <i class="fa-solid fa-users w-5"></i>
                    Applicants
                </a>
                <a href="{{ route('employer.company.profile') }}"
                    class=" {{ request()->routeIs('employer.company.profile') ? 'bg-[#3b4468] text-white shadow-md' : 'text-gray-500 hover:bg-white/50' }} flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200">
                    <i class="fa-solid fa-building w-5"></i>
                    Company Profile
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-semibold text-gray-500 hover:bg-white/50 transition-all duration-200">
                    <i class="fa-solid fa-gear w-5"></i>
                    Settings
                </a>
            </nav>

            <!-- Bottom Section -->
            <div class="p-4 border-t border-gray-200/50 space-y-4">
                <div class="px-2 space-y-2">
                    <div class="flex justify-between text-[11px] font-bold text-gray-400 uppercase tracking-wider">
                        <span>Active Jobs</span>
                        <span class="text-gray-600">12</span>
                    </div>
                    <div class="flex justify-between text-[11px] font-bold text-gray-400 uppercase tracking-wider">
                        <span>Total Applicants</span>
                        <span class="text-gray-600">148</span>
                    </div>
                </div>

                <a href="{{ route('employer.manageJobs') }}#post-new-job"
                    class="w-full bg-linkedin-blue text-white py-2.5 rounded-lg text-sm font-bold shadow-sm hover:bg-linkedin-darkBlue transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-plus text-xs"></i>
                    Post New Job
                </a>

                <div class="space-y-1">
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2 text-sm font-semibold text-gray-400 hover:text-gray-600 transition-colors">
                        <i class="fa-solid fa-circle-question w-5"></i>
                        Support
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 px-4 py-2 text-sm font-semibold text-gray-400 hover:text-red-500 transition-colors">
                            <i class="fa-solid fa-arrow-right-from-bracket w-5"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-grow ml-64 flex flex-col">
            <!-- Top Nav -->
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 sticky top-0 z-40">
                <!-- Search -->
                <div class="relative w-96">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fa-solid fa-magnifying-glass text-sm"></i>
                    </span>
                    <input type="text" placeholder="Search candidates or jobs..."
                        class="block w-full pl-10 pr-3 py-2 bg-gray-50 border border-gray-200 rounded-full focus:ring-2 focus:ring-linkedin-blue focus:bg-white text-sm transition-all border-none">
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-5">
                    <div class="relative" id="notification-bell">
                        <button onclick="toggleNotifications()"
                            class="relative text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fa-solid fa-bell text-lg"></i>

                            @if (auth()->user()->unreadNotifications->count() > 0)
                                <span
                                    class="absolute -top-1 -right-2 w-4 h-4 bg-red-500 rounded-full border-[2px] border-white text-white text-[9px] flex items-center justify-center">
                                    {{ auth()->user()->unreadNotifications->count() }}
                                </span>
                            @endif
                        </button>

                        {{-- Dropdown --}}
                        <div id="notification-dropdown"
                            class="hidden absolute right-0 top-10 w-80 bg-white rounded-xl shadow-lg border border-gray-100 z-50">

                            {{-- Header --}}
                            <div class="flex items-center justify-between px-4 py-3 border-b">
                                <h3 class="font-semibold text-slate-800">Notifications</h3>
                                <button onclick="markAllRead()" class="text-xs text-linkedin-blue hover:underline">
                                    Mark all read
                                </button>
                            </div>

                            {{-- Notifications List --}}
                            <div id="notifications-list" class="max-h-80 overflow-y-auto">
                                @forelse(auth()->user()->notifications->take(10) as $notification)
                                    <div onclick="readNotification('{{ $notification->id }}', '{{ $notification->data['link'] ?? '#' }}')"
                                        class="flex gap-3 px-4 py-3 cursor-pointer hover:bg-slate-50 border-b
                                                                                            {{ is_null($notification->read_at) ? 'bg-blue-50' : 'bg-white' }}">
                                        <div
                                            class="shrink-0 w-8 h-8 rounded-full bg-linkedin-blue flex items-center justify-center text-white text-xs">
                                            <i class="fa-solid fa-briefcase"></i>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm text-slate-700">
                                                {{ $notification->data['message'] ?? 'i have to store the message' }}
                                            </p>
                                            <p class="text-xs text-slate-400 mt-1">
                                                {{ $notification->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                        @if (is_null($notification->read_at))
                                            <span class="shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2"></span>
                                        @endif
                                    </div>
                                @empty
                                    <div class="px-4 py-8 text-center text-slate-400">
                                        <i class="fa-solid fa-bell-slash text-2xl mb-2"></i>
                                        <p class="text-sm">No notifications yet</p>
                                    </div>
                                @endforelse
                            </div>

                            {{-- Footer --}}
                            <div class="px-4 py-3 border-t text-center">
                                <a href="" class="text-xs text-linkedin-blue hover:underline">
                                    View all notifications
                                </a>
                            </div>
                        </div>
                    </div>
                    <button class="text-gray-400 hover:text-gray-600 transition-colors">
                        <i class="fa-solid fa-comment-dots text-lg"></i>
                    </button>
                    <div class="h-8 w-px bg-gray-200 mx-1"></div>
                    <button class="flex items-center gap-2 group">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0a66c2&color=fff"
                            class="w-8 h-8 rounded-full shadow-sm" alt="Profile">
                        <i
                            class="fa-solid fa-caret-down text-[10px] text-gray-400 group-hover:text-gray-600 transition-colors"></i>
                    </button>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-8">
                @yield('employer-content')
            </main>
        </div>
    </div>

    <!-- Floating Action Button -->
    {{-- <button
        class="fixed bottom-8 right-8 w-14 h-14 bg-linkedin-blue text-white rounded-full shadow-xl hover:bg-linkedin-darkBlue transition-all transform hover:scale-110 flex items-center justify-center z-50">
        <i class="fa-solid fa-plus text-xl"></i>
    </button> --}}
@endsection

@section('footer')

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            window.Echo.private(`App.Models.User.{{ auth()->id() }}`)
                .notification((notification) => {
                    console.log('New notification:', notification);
                    updateBellCount();
                    addNotificationToDropdown(notification);
                });
        });
        function updateBellCount() {
            const badge = document.querySelector('#notification-bell span');
            if (badge) {
                const count = parseInt(badge.innerText) + 1;
                badge.innerText = count;
            } else {
                // create badge if not exists
                const bell = document.querySelector('#notification-bell button');
                bell.insertAdjacentHTML('beforeend', `
                        <span class="absolute -top-0 -right-1 w-4 h-4 bg-red-500 rounded-full border-[2px] border-white text-white text-[9px] flex items-center justify-center">1</span>
                    `);
            }
        }

        function addNotificationToDropdown(notification) {
            const list = document.getElementById('notifications-list');
            const html = `
                <div onclick="readNotification('${notification.id}', '${notification.link}')"
                     class="flex gap-3 px-4 py-3 cursor-pointer hover:bg-slate-50 border-b bg-blue-50">
                    <div class="shrink-0 w-8 h-8 rounded-full bg-linkedin-blue flex items-center justify-center text-white text-xs">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-slate-700">${notification.message}</p>
                        <p class="text-xs text-slate-400 mt-1">Just now</p>
                    </div>
                    <span class="shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2"></span>
                </div>
            `;
            list.insertAdjacentHTML('afterbegin', html);
        }


        function toggleNotifications() {
            const dropdown = document.getElementById('notification-dropdown');
            dropdown.classList.toggle('hidden');
        }

        document.addEventListener('click', function (e) {
            const bell = document.getElementById('notification-bell');
            if (!bell.contains(e.target)) {
                document.getElementById('notification-dropdown').classList.add('hidden');
            }
        });

        function readNotification(notificationId, link) {
            fetch(`/notifications/${notificationId}/read`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }).then(res => res.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = link;
                    }
                })
        }


        function markAllRead() {
            fetch(`/notifications/read-all`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }).then(res => res.json())
                .then(data => {
                    if (data.success) {
                        // Optionally, you can refresh the page or update the notification count/UI here
                        // location.reload();

                        // remove blue dot and background from all notifications
                        document.querySelectorAll('#notifications-list .bg-blue-50')
                            .forEach(el => el.classList.replace('bg-blue-50', 'bg-white'));
                        document.querySelectorAll('#notifications-list .bg-blue-500.rounded-full')
                            .forEach(el => el.remove());
                        // update bell count to 0
                        const badge = document.querySelector('#notification-bell span');
                        if (badge) badge.remove();

                    }
                })
        }

    </script>
    <!-- Footer is handled within the layout structure -->
@endsection