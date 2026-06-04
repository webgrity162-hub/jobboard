@extends('layouts.auth')

@section('title', 'Setup Company Profile | JobConnect')
@section('header-alignment', 'text-center')

@section('content')
    <div class="max-w-2xl w-full">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-linkedin-darkBlue mb-2">Welcome to JobConnect for Employers!</h1>
            <p class="text-gray-600 text-lg font-light">Let's set up your company profile to start posting jobs and finding
                top talent.</p>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-xl border border-gray-100">
            <form action="{{ route('employer.setup-company.post') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <!-- Company Logo -->
                <div class="flex flex-col items-center mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Company Logo</label>
                    <div class="relative group">
                        <div id="logo-preview"
                            class="w-32 h-32 rounded border-2 border-dashed border-gray-300 flex items-center justify-center overflow-hidden bg-gray-50">
                            <i class="fa-solid fa-building text-gray-300 text-4xl"></i>
                        </div>
                        <input type="file" name="logo" id="logo-input" class="hidden" accept="image/*"
                            onchange="previewLogo(this)">
                        <button type="button" onclick="document.getElementById('logo-input').click()"
                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition rounded flex items-center justify-center">
                            <span class="text-white opacity-0 group-hover:opacity-100 text-sm font-bold">Upload Logo</span>
                        </button>
                    </div>
                    @error('logo')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-1">Company Name</label>
                        <input type="text" id="name" name="name"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-linkedin-blue focus:outline-none transition @error('name') border-red-500 @enderror"
                            placeholder="e.g. TechCorp Solutions" name="name" required>
                        @error('name')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-1">Company Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-linkedin-blue focus:outline-none transition @error('email') border-red-500 @enderror"
                            placeholder="hr@techcorp.com" name="email" required>
                        @error('email')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-bold text-gray-700 mb-1">Phone Number</label>
                        <input type="text" id="phone" name="phone"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-linkedin-blue focus:outline-none transition @error('phone')  border-red-500 @enderror"
                            placeholder="+1 (555) 000-0000"
                            @error('phone') autofocus @enderror>
                        @error('phone')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="website" class="block text-sm font-bold text-gray-700 mb-1">Website URL</label>
                        <input type="url" id="website" name="website"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-linkedin-blue focus:outline-none transition @error('website')  border-red-500
                            @enderror"
                            placeholder="https://www.techcorp.com"
                            @error('website') autofocus
                            @enderror>
                        @error('website')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="location" class="block text-sm font-bold text-gray-700 mb-1">Location</label>
                        <input type="text" id="location" name="location"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-linkedin-blue focus:outline-none transition @error('location')  border-red-500
                            @enderror"
                            placeholder="e.g. San Francisco, CA"
                            @error('location') autofocus 
                            @enderror>
                        @error('location')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="company_size" class="block text-sm font-bold text-gray-700 mb-1">Company Size</label>
                        <select id="company_size" name="company_size"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-linkedin-blue focus:outline-none transition @error('company_size') border-red-500
                            @enderror" @error('company_size') autofocus
                            @enderror>
                            <option value="">Select size...</option>
                            <option value="10-15">10-15 employees</option>
                            <option value="20-50">20-50 employees</option>
                            <option value="50-150">50-150 employees</option>
                            <option value="150-250">150-250 employees</option>
                            
                            <option value="500+">500+ employees</option>
                        </select>
                        @error('company_size')
                            <p class="text-red-500 text-sm">{{ $message }}</p>

                        @enderror
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-bold text-gray-700 mb-1">Company Description</label>
                    <textarea id="description" name="description" rows="5"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-linkedin-blue focus:outline-none transition @error('description') border-red-500
                        @enderror"
                        placeholder="Tell us about your company's mission and culture..." @error('description') autofocus
                        @enderror></textarea>
                        @error('description')
                            <p class="text-red-500 text-sm">{{ $message }}</p>

                        @enderror
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-linkedin-blue text-white py-4 rounded-full text-xl font-bold hover:bg-linkedin-darkBlue transition shadow-lg flex items-center justify-center gap-3">
                        Save and Continue <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>

        <p class="text-center mt-8 text-gray-500 text-sm">
            Step 2 of 2: Building your professional presence
        </p>
    </div>

    <script>
        function previewLogo(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('logo-preview');
                    preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-contain">`;
                    preview.classList.remove('border-dashed');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

@section('footer-class', 'py-8 text-center text-sm text-gray-500')
@section('footer-content')
    <div class="flex justify-center gap-6 mb-4 font-semibold uppercase tracking-wider text-[10px]">
        <a href="#" class="hover:underline">About</a>
        <a href="#" class="hover:underline">Privacy Policy</a>
        <a href="#" class="hover:underline">Terms of Service</a>
    </div>
    <p>&copy; {{ date('Y') }} JobConnect Corporation</p>
@endsection
