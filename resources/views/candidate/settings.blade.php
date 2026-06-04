@extends('layouts.candidate')

@section('title', 'Settings & Privacy | JobConnect')

@section('candidate-content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <h1 class="text-xl font-bold mb-1">Account Settings</h1>
            <p class="text-sm text-gray-500">Manage your profile information and account security</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Left Navigation -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <nav class="flex flex-col">
                        <a href="#profile" class="px-4 py-3 text-sm font-bold text-linkedin-blue bg-blue-50 border-l-4 border-linkedin-blue transition">
                            <i class="fa-solid fa-user mr-3"></i> Public Profile
                        </a>
                        <a href="#account" class="px-4 py-3 text-sm font-bold text-gray-600 hover:bg-gray-50 border-l-4 border-transparent transition">
                            <i class="fa-solid fa-envelope mr-3"></i> Account Access
                        </a>
                        <a href="#security" class="px-4 py-3 text-sm font-bold text-gray-600 hover:bg-gray-50 border-l-4 border-transparent transition">
                            <i class="fa-solid fa-shield-halved mr-3"></i> Security
                        </a>
                        <a href="#privacy" class="px-4 py-3 text-sm font-bold text-gray-600 hover:bg-gray-50 border-l-4 border-transparent transition">
                            <i class="fa-solid fa-eye mr-3"></i> Privacy & Data
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Right Content Area -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Profile Section -->
                <div id="profile" class="bg-white rounded-lg border border-gray-200 shadow-sm">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="font-bold">Public Profile Information</h2>
                    </div>
                    <form action="{{ route('candidate.settings.post') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                        @csrf
                        <div class="flex items-center gap-6 pb-6 border-b border-gray-100">
                            <div class="relative group">
                                <img id="avatar-preview" src="{{ asset('storage/'.$user->avatar) }}" class="w-20 h-20 rounded-full border-2 border-gray-100 object-cover" alt="Avatar">
                                <input type="file" id="avatar-input" name="avatar" class="hidden" accept="image/*" onchange="previewImage(event)">
                                <button type="button" onclick="document.getElementById('avatar-input').click()" class="absolute inset-0 bg-black bg-opacity-40 rounded-full opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-bold">
                                    Change
                                </button>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm">Profile Photo</h3>
                                <p class="text-xs text-gray-500 mt-1">Show your face! Recruiters love to see who they're talking to.</p>
                                <div class="mt-3 flex gap-2">
                                    <button type="button" onclick="document.getElementById('avatar-input').click()" class="text-xs font-bold text-linkedin-blue hover:bg-blue-50 px-3 py-1 rounded-full border border-linkedin-blue">Upload</button>
                                    <button type="button" class="text-xs font-bold text-red-500 hover:bg-red-50 px-3 py-1 rounded-full border border-red-200">Remove</button>
                                </div>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-1 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Full Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm font-semibold">
                            </div>
                            
                        </div>
                            <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Email</label>
                            <input type="text" name="email" value="{{ $user->email }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm font-semibold">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Phone</label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm font-semibold">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Bio</label>
                            <textarea name="bio" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm font-semibold" placeholder="Tell recruiters about yourself...">{{ $user->bio }}</textarea>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit" class="bg-linkedin-blue text-white px-6 py-2 rounded-full font-bold hover:bg-linkedin-darkBlue transition shadow-sm">
                                Save Profile Changes
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Account Security Section -->
                <div id="security" class="bg-white rounded-lg border border-gray-200 shadow-sm">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="font-bold">Security Settings</h2>
                    </div>
                    <div class="p-6 space-y-6">
                        
                        
                        <div class="flex justify-between items-center  ">
                            <div>
                                <h3 class="font-bold text-sm">Change Password</h3>
                                <p class="text-xs text-gray-500">Last changed 3 months ago</p>
                            </div>
                            <button onclick="openPasswordModal()" class="text-xs font-bold text-linkedin-blue hover:underline">Update</button>
                        </div>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="bg-red-50 rounded-lg border border-red-100 p-6 shadow-sm">
                    <h2 class="font-bold text-red-700 mb-2">Close Account</h2>
                    <p class="text-xs text-red-600 mb-4">Warning: This action is permanent and will delete all your applications, messages, and profile data.</p>
                    <button class="text-xs font-bold text-red-700 hover:bg-red-100 px-4 py-2 rounded-full border border-red-200 transition">
                        Deactivate My Account
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Password Change Modal -->
    <div id="passwordModal" class="{{ $errors->has('current_password') || $errors->has('new_password') ? '' : 'hidden' }} fixed inset-0 bg-black bg-opacity-50 z-[100] flex items-center justify-center px-4">
        <div class="bg-white rounded-lg w-full max-w-md overflow-hidden shadow-2xl animate-in fade-in zoom-in duration-200">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <h3 class="font-bold text-xl">Change Password</h3>
                <button onclick="closePasswordModal()" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
            </div>
            <form action="{{ route('candidate.settings-password.post') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Current Password</label>
                    <input type="password" name="current_password" class="w-full px-4 py-2 border @error('current_password') border-red-500 @else border-gray-300 @enderror rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm font-semibold">
                    @error('current_password')
                        <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">New Password</label>
                    <input type="password" name="new_password" class="w-full px-4 py-2 border @error('new_password') border-red-500 @else border-gray-300 @enderror rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm font-semibold">
                    @error('new_password')
                        <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm font-semibold">
                </div>
                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" class="w-full bg-linkedin-blue text-white py-2 rounded-full font-bold hover:bg-linkedin-darkBlue transition shadow-sm">
                        Update Password
                    </button>
                    <button type="button" onclick="closePasswordModal()" class="w-full text-gray-500 py-2 rounded-full font-bold hover:bg-gray-100 transition">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('avatar-preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function openPasswordModal() {
            document.getElementById('passwordModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closePasswordModal() {
            document.getElementById('passwordModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('passwordModal');
            if (event.target == modal) {
                closePasswordModal();
            }
        }
    </script>
@endsection
