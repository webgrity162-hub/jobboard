<!-- Navbar -->
<nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <div class="bg-linkedin-blue text-white p-1 rounded">
                        <i class="fa-solid fa-briefcase text-xl px-1"></i>
                    </div>
                    <span class="text-2xl font-bold text-linkedin-blue tracking-tight">JobConnect</span>
                </a>
                <div class="hidden md:flex ml-10 space-x-8">
                    <a href="#" class="text-gray-600 hover:text-linkedin-blue font-medium transition">Find Jobs</a>
                    <a href="#" class="text-gray-600 hover:text-linkedin-blue font-medium transition">Companies</a>
                    <a href="#" class="text-gray-600 hover:text-linkedin-blue font-medium transition">Salaries</a>
                </div>
            </div>
            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-linkedin-blue hover:bg-linkedin-lightBlue px-4 py-2 rounded-full font-semibold transition">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:bg-gray-100 px-4 py-2 rounded-full font-semibold transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-linkedin-blue hover:bg-linkedin-lightBlue px-4 py-2 rounded-full font-semibold transition">Sign in</a>
                    <a href="{{ route('register') }}" class="border border-linkedin-blue text-linkedin-blue hover:bg-linkedin-lightBlue hover:border-linkedin-darkBlue px-4 py-2 rounded-full font-semibold transition">Join now</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
