@extends('layouts.app')

@section('navbar')
    <!-- Top Navigation Bar (Dashboard Version) -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-14 items-center">
                <div class="flex items-center gap-4 flex-grow">
                    <a href="{{ url('/') }}" class="bg-linkedin-blue text-white p-1 rounded">
                        <i class="fa-solid fa-briefcase text-xl px-1"></i>
                    </a>
                    <div class="relative max-w-md w-full hidden sm:block">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" placeholder="Search"
                            class="block w-full pl-10 pr-3 py-1.5 bg-gray-100 border-none rounded focus:ring-2 focus:ring-linkedin-blue focus:bg-white text-sm transition">
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    <a href="{{ route('candidate.dashboard') }}"
                        class="flex flex-col items-center {{ request()->routeIs('candidate.dashboard') ? 'text-black border-b-2 border-black' : 'text-gray-500 hover:text-gray-900' }} transition h-14 justify-center pt-1">
                        <i class="fa-solid fa-house text-xl"></i>
                        <span class="text-xs mt-1">Home</span>
                    </a>
                    <a href="{{ route('candidate.jobs.index') }}"
                        class="flex flex-col items-center {{ request()->routeIs('candidate.jobs.*') ? 'text-black border-b-2 border-black' : 'text-gray-500 hover:text-gray-900' }} transition h-14 justify-center pt-1">
                        <i class="fa-solid fa-briefcase text-xl"></i>
                        <span class="text-xs mt-1">Jobs</span>
                    </a>
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
                    <a href="#"
                        class="flex flex-col items-center text-gray-500 hover:text-gray-900 transition h-14 justify-center pt-1">
                        <i class="fa-solid fa-message text-xl"></i>
                        <span class="text-xs mt-1">Messaging</span>
                    </a>
                    <div class="relative group">
                        <button
                            class="flex flex-col items-center text-gray-500 hover:text-gray-900 transition border-l border-gray-200 pl-4 h-14 justify-center pt-1">
                            <img src="{{ asset('storage/' . $candidate->avatar) }}" class="w-6 h-6 rounded-full"
                                alt="Profile">
                            <span class="text-xs mt-1 flex items-center gap-1">Me <i
                                    class="fa-solid fa-caret-down text-[10px]"></i></span>
                        </button>
                        <!-- Dropdown Menu -->
                        <div
                            class="absolute right-0 mt-0 w-64 bg-white rounded-lg shadow-xl border border-gray-200 hidden group-hover:block z-50 overflow-hidden">
                            <div class="p-4 border-b border-gray-100">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('storage/' . $candidate->avatar) }}" class="w-12 h-12 rounded-full"
                                        alt="Profile">
                                    <div>
                                        <p class="font-bold text-sm">{{ $candidate->name }}</p>
                                        <p class="text-xs text-gray-500 truncate">{{ $candidate->email }}</p>
                                    </div>
                                </div>
                                <a href="{{ route('candidate.settings') }}"
                                    class="mt-3 block w-full text-center py-1 border border-linkedin-blue text-linkedin-blue rounded-full text-xs font-bold hover:bg-blue-50 transition">View
                                    Profile</a>
                            </div>
                            <div class="py-2">
                                <p class="px-4 py-1 text-xs font-bold text-gray-900">Account</p>
                                <a href="{{ route('candidate.settings') }}"
                                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Settings & Privacy</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Help</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 border-b border-gray-100 pb-3">Language</a>

                                <form action="{{ route('logout') }}" method="POST" class="mt-2">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Sign
                                        Out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <div class="bg-linkedin-lightBlue py-8 min-h-[calc(100vh-56px)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-4 gap-6">

                <!-- Sidebar -->
                <aside class="lg:col-span-1 space-y-4">
                    <!-- Profile Card -->
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                        <div class="h-16 bg-gradient-to-r from-blue-400 to-linkedin-blue"></div>
                        <div class="px-4 pb-4 -mt-8 text-center border-b border-gray-100">
                            <img src="{{ asset('storage/' . $candidate->avatar) }}"
                                class="w-16 h-16 rounded-full border-2 border-white mx-auto mb-3 shadow-md object-cover"
                                alt="Avatar">
                            <h2 class="font-bold text-lg hover:underline cursor-pointer">{{ $candidate->name }}</h2>
                            <p class="text-xs text-gray-500 mb-2">Candidate Account</p>
                        </div>
                        <div class="p-3">
                            <a href="#"
                                class="text-xs font-bold text-gray-500 hover:bg-gray-100 p-2 rounded block transition">
                                <div class="flex justify-between items-center">
                                    <span>Profile viewers</span>
                                    <span class="text-linkedin-blue">142</span>
                                </div>
                            </a>
                            <a href="#"
                                class="text-xs font-bold text-gray-500 hover:bg-gray-100 p-2 rounded block transition">
                                <div class="flex justify-between items-center">
                                    <span>Post impressions</span>
                                    <span class="text-linkedin-blue">1,245</span>
                                </div>
                            </a>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 border-t border-gray-100">
                            <a href="#"
                                class="text-xs font-bold text-gray-600 flex items-center gap-2 hover:bg-gray-100 p-1 rounded transition">
                                <i class="fa-solid fa-bookmark text-gray-400"></i> My items
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="bg-white rounded-lg border border-gray-200 p-4 shadow-sm sticky top-20">
                        <h3 class="text-sm font-bold mb-4">Manage My Career</h3>
                        <nav class="space-y-1">
                            <a href="{{ route('candidate.dashboard') }}"
                                class="flex items-center gap-3 text-sm font-bold p-2 rounded transition {{ request()->routeIs('candidate.dashboard') ? 'bg-blue-50 text-linkedin-blue' : 'text-gray-600 hover:bg-gray-50' }}">
                                <i class="fa-solid fa-file-lines w-5"></i> My Applications
                            </a>
                            <a href="{{ route('candidate.job-alerts') }}"
                                class="flex items-center gap-3 text-sm font-bold p-2 rounded transition {{ request()->routeIs('candidate.job-alerts') ? 'bg-blue-50 text-linkedin-blue' : 'text-gray-600 hover:bg-gray-50' }}">
                                <i class="fa-solid fa-bell w-5"></i> Job Alerts
                            </a>
                            <a href="{{ route('candidate.skill-assessments') }}"
                                class="flex items-center gap-3 text-sm font-bold p-2 rounded transition {{ request()->routeIs('candidate.skill-assessments') ? 'bg-blue-50 text-linkedin-blue' : 'text-gray-600 hover:bg-gray-50' }}">
                                <i class="fa-solid fa-clipboard-check w-5"></i> Skill Assessments
                            </a>
                            <a href="{{ route('candidate.job-preferences') }}"
                                class="flex items-center gap-3 text-sm font-bold p-2 rounded transition {{ request()->routeIs('candidate.job-preferences') ? 'bg-blue-50 text-linkedin-blue' : 'text-gray-600 hover:bg-gray-50' }}">
                                <i class="fa-solid fa-sliders w-5"></i> Job Preferences
                            </a>
                            <a href="{{ route('candidate.settings') }}"
                                class="flex items-center gap-3 text-sm font-bold p-2 rounded transition {{ request()->routeIs('candidate.settings') ? 'bg-blue-50 text-linkedin-blue' : 'text-gray-600 hover:bg-gray-50' }}">
                                <i class="fa-solid fa-gear w-5"></i> Settings
                            </a>
                        </nav>
                    </div>
                </aside>

                <!-- Main Content Area -->
                <main class="lg:col-span-3">
                    @yield('candidate-content')
                </main>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <!-- Minimal footer for dashboard -->
    <footer class="bg-white border-t border-gray-200 py-6 mt-auto">
        <div
            class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
            <div class="flex items-center gap-4">
                <span class="font-bold text-linkedin-blue flex items-center gap-1">
                    <i class="fa-solid fa-briefcase"></i> JobConnect
                </span>
                <span>&copy; {{ date('Y') }}</span>
            </div>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#" class="hover:underline">About</a>
                <a href="#" class="hover:underline">Accessibility</a>
                <a href="#" class="hover:underline">User Agreement</a>
                <a href="#" class="hover:underline">Privacy Policy</a>
                <a href="#" class="hover:underline">Cookie Policy</a>
                <a href="#" class="hover:underline">Copyright Policy</a>
                <a href="#" class="hover:underline">Brand Policy</a>
                <a href="#" class="hover:underline">Guest Controls</a>
                <a href="#" class="hover:underline">Community Guidelines</a>
            </div>
        </div>
    </footer>

    <script>

        document.addEventListener('DOMContentLoaded',function(){
            Echo.private('App.Models.User.'+{{ auth()->id() }})
            .notification((notification) => {
                upadteBell();
                addNotificationToDropdown(notification);
                    console.log('New notification:', notification);

            });
        })

        function upadteBell(){
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
            document.getElementById('notification-dropdown').classList.toggle('hidden');
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
@endsection