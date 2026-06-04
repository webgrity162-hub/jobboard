@extends('layouts.auth')

@section('title', 'Join JobConnect | Professional Network')
@section('header-alignment', 'text-center')

@section('content')
    <h1 class="text-3xl font-light mb-8">Make the most of your professional life</h1>
    
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-lg border border-gray-100">
        <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <!-- Role Selection -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <label class="cursor-pointer">
                    <input type="radio" name="role" value="candidate" class="peer hidden" {{ old('role', 'candidate') === 'candidate' ? 'checked' : '' }} onchange="toggleFields('candidate')">
                    <div class="border-2 border-gray-200 rounded-lg p-4 text-center hover:border-linkedin-blue peer-checked:border-linkedin-blue peer-checked:bg-blue-50 transition">
                        <i class="fa-solid fa-user-tie text-2xl mb-2 text-gray-400 peer-checked:text-linkedin-blue"></i>
                        <p class="font-bold text-gray-700">Candidate</p>
                        <p class="text-xs text-gray-500">I'm looking for a job</p>
                    </div>
                </label>
                <label class="cursor-pointer">
                    <input type="radio" name="role" value="employer" class="peer hidden" {{ old('role') === 'employer' ? 'checked' : '' }} onchange="toggleFields('employer')">
                    <div class="border-2 border-gray-200 rounded-lg p-4 text-center hover:border-linkedin-blue peer-checked:border-linkedin-blue peer-checked:bg-blue-50 transition">
                        <i class="fa-solid fa-building text-2xl mb-2 text-gray-400 peer-checked:text-linkedin-blue"></i>
                        <p class="font-bold text-gray-700">Employer</p>
                        <p class="text-xs text-gray-500">I'm looking to hire</p>
                    </div>
                </label>
            </div>
            @error('role')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <!-- Profile Picture -->
            <div class="flex flex-col items-center mb-6">
                <label class="block text-sm font-medium text-gray-500 mb-2">Profile Picture</label>
                <div class="relative group">
                    <div id="avatar-preview" class="w-24 h-24 rounded-full bg-gray-100 border-2 @error('avatar') border-red-500 @else border-gray-200 @enderror flex items-center justify-center overflow-hidden">
                        <i class="fa-solid fa-camera text-gray-400 text-2xl"></i>
                    </div>
                    <input type="file" name="avatar" id="avatar-input" class="hidden" accept="image/*" onchange="previewAvatar(this)">
                    <button type="button" onclick="document.getElementById('avatar-input').click()" class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition rounded-full flex items-center justify-center">
                        <span class="text-white opacity-0 group-hover:opacity-100 text-xs font-bold">Change</span>
                    </button>
                </div>
                @error('avatar')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-500 mb-1">First name</label>
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" 
                        class="w-full px-3 py-2 border @error('first_name') border-red-500 @else border-gray-400 @enderror rounded focus:outline-none focus:ring-1 focus:ring-linkedin-blue"
                        @error('first_name') autofocus @enderror>
                    @error('first_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-500 mb-1">Last name</label>
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                        class="w-full px-3 py-2 border @error('last_name') border-red-500 @else border-gray-400 @enderror rounded focus:outline-none focus:ring-1 focus:ring-linkedin-blue"
                        @error('last_name') autofocus @enderror>
                    @error('last_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full px-3 py-2 border @error('email') border-red-500 @else border-gray-400 @enderror rounded focus:outline-none focus:ring-1 focus:ring-linkedin-blue"
                    @error('email') autofocus @enderror>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-500 mb-1">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                    class="w-full px-3 py-2 border @error('phone') border-red-500 @else border-gray-400 @enderror rounded focus:outline-none focus:ring-1 focus:ring-linkedin-blue"
                    @error('phone') autofocus @enderror>
                @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Candidate Only Field -->
            <div id="candidate-fields">
                <label for="bio" class="block text-sm font-medium text-gray-500 mb-1">Professional Bio</label>
                <textarea id="bio" name="bio" rows="3" 
                    class="w-full px-3 py-2 border @error('bio') border-red-500 @else border-gray-400 @enderror rounded focus:outline-none focus:ring-1 focus:ring-linkedin-blue" 
                    placeholder="Tell us about your professional background..."
                    @error('bio') autofocus @enderror>{{ old('bio') }}</textarea>
                @error('bio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-500 mb-1">Password (6 or more characters)</label>
                <input type="password" id="password" name="password" 
                    class="w-full px-3 py-2 border @error('password') border-red-500 @else border-gray-400 @enderror rounded focus:outline-none focus:ring-1 focus:ring-linkedin-blue"
                    @error('password') autofocus @enderror>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <p class="text-xs text-center text-gray-500 py-2">
                By clicking Agree & Join, you agree to the JobConnect <a href="#" class="text-linkedin-blue font-bold">User Agreement</a>, <a href="#" class="text-linkedin-blue font-bold">Privacy Policy</a>, and <a href="#" class="text-linkedin-blue font-bold">Cookie Policy</a>.
            </p>

            <button type="submit" class="w-full bg-linkedin-blue text-white py-3 rounded-full text-lg font-semibold hover:bg-linkedin-darkBlue transition shadow-md">
                Agree & Join
            </button>
        </form>

        <div class="mt-6 flex items-center gap-4">
            <div class="flex-grow h-px bg-gray-200"></div>
            <span class="text-gray-400 text-sm">or</span>
            <div class="flex-grow h-px bg-gray-200"></div>
        </div>

        <button class="mt-6 w-full border border-gray-400 py-2 rounded-full flex items-center justify-center gap-3 hover:bg-gray-50 transition font-medium text-gray-700">
            <img src="https://www.google.com/favicon.ico" class="w-5 h-5" alt="Google">
            Continue with Google
        </button>

        <p class="mt-6 text-center text-gray-600">
            Already on JobConnect? <a href="{{ route('login') }}" class="text-linkedin-blue font-bold hover:underline">Sign in</a>
        </p>
    </div>

    <script>
        function toggleFields(role) {
            const candidateFields = document.getElementById('candidate-fields');
            const bioInput = document.getElementById('bio');
            
            if (role === 'employer') {
                candidateFields.classList.add('hidden');
               
            } else {
                candidateFields.classList.remove('hidden');
               
            }
        }

        function previewAvatar(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('avatar-preview');
                    preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Initialize state
        document.addEventListener('DOMContentLoaded', () => {
            const selectedRole = document.querySelector('input[name="role"]:checked').value;
            toggleFields(selectedRole);
        });
    </script>
@endsection

@section('footer-class', 'py-8 bg-white border-t border-gray-200')
@section('footer-content')
    <div class="max-w-7xl mx-auto px-4 flex flex-wrap justify-center gap-6 text-xs text-gray-500 font-semibold uppercase tracking-wider">
        <a href="#" class="hover:underline">About</a>
        <a href="#" class="hover:underline">Accessibility</a>
        <a href="#" class="hover:underline">User Agreement</a>
        <a href="#" class="hover:underline">Privacy Policy</a>
        <a href="#" class="hover:underline">Cookie Policy</a>
        <a href="#" class="hover:underline">Copyright Policy</a>
        <a href="#" class="hover:underline">Brand Policy</a>
        <a href="#" class="hover:underline">Guest Controls</a>
        <a href="#" class="hover:underline">Community Guidelines</a>
        <a href="#" class="hover:underline">Language</a>
    </div>
@endsection
