@extends('layouts.auth')

@section('title', 'Sign In | JobConnect')

@section('content')
    <div class="w-full max-w-md">
        <div class="bg-white p-8 rounded-lg shadow-xl w-full border border-gray-100">
            <h1 class="text-3xl font-semibold mb-2">Sign in</h1>
            <p class="text-gray-600 mb-8">Stay updated on your professional world</p>

            <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email or Phone</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-3 border @error('email') border-red-500 @else border-gray-400 @enderror rounded focus:outline-none focus:ring-2 focus:ring-linkedin-blue focus:border-transparent transition"
                        @if(!old('email')) autofocus @endif>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" 
                            class="w-full px-4 py-3 border @error('password') border-red-500 @else border-gray-400 @enderror rounded focus:outline-none focus:ring-2 focus:ring-linkedin-blue focus:border-transparent transition"
                            @if(old('email')) autofocus @endif>
                        <button type="button" onclick="togglePassword()" id="toggleBtn" class="absolute right-3 top-1/2 -translate-y-1/2 text-linkedin-blue font-semibold hover:bg-blue-50 px-2 py-1 rounded">Show</button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <a href="#" class="block text-linkedin-blue font-semibold hover:underline">Forgot password?</a>
                
                <button type="submit" class="w-full bg-linkedin-blue text-white py-3 rounded-full text-lg font-semibold hover:bg-linkedin-darkBlue transition shadow-md">
                    Sign in
                </button>
            </form>

            <div class="mt-8 flex items-center gap-4">
                <div class="flex-grow h-px bg-gray-300"></div>
                <span class="text-gray-500 text-sm">or</span>
                <div class="flex-grow h-px bg-gray-300"></div>
            </div>

            <div class="mt-8 space-y-4">
                <button class="w-full border border-gray-400 py-2.5 rounded-full flex items-center justify-center gap-3 hover:bg-gray-50 transition font-medium text-gray-700">
                    <img src="https://www.google.com/favicon.ico" class="w-5 h-5" alt="Google">
                    Continue with Google
                </button>
                <button class="w-full border border-gray-400 py-2.5 rounded-full flex items-center justify-center gap-3 hover:bg-gray-50 transition font-medium text-gray-700">
                    <i class="fa-brands fa-apple text-xl"></i>
                    Sign in with Apple
                </button>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const toggleBtn = document.getElementById('toggleBtn');
            if (password.type === 'password') {
                password.type = 'text';
                toggleBtn.textContent = 'Hide';
            } else {
                password.type = 'password';
                toggleBtn.textContent = 'Show';
            }
        }
    </script>
@endsection

@section('footer-content')
    <p>New to JobConnect? <a href="{{ route('register') }}" class="text-linkedin-blue font-bold hover:underline">Join now</a></p>
    <div class="mt-4 flex justify-center gap-6">
        <a href="#" class="hover:underline">User Agreement</a>
        <a href="#" class="hover:underline">Privacy Policy</a>
        <a href="#" class="hover:underline">Community Guidelines</a>
        <a href="#" class="hover:underline">Copyright Policy</a>
    </div>
@endsection
