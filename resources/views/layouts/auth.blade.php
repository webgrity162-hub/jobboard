<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auth | JobConnect')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        linkedin: {
                            blue: '#0a66c2',
                            darkBlue: '#004182',
                            lightBlue: '#eef3f8',
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", "Fira Sans", Ubuntu, Oxygen, "Oxygen Sans", Cantarell, "Droid Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Lucida Grande", Helvetica, Arial, sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    <x-toast-container />

    <!-- Header -->
    <header class="p-8">
        <div class="max-w-7xl mx-auto @yield('header-alignment', '')">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2">
                <div class="bg-linkedin-blue text-white p-1 rounded">
                    <i class="fa-solid fa-briefcase text-xl px-1"></i>
                </div>
                <span class="text-2xl font-bold text-linkedin-blue tracking-tight">JobConnect</span>
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col items-center justify-center px-4 py-12">
        @yield('content')
    </main>

    <footer class="@yield('footer-class', 'py-8 text-center text-sm text-gray-500')">
        @yield('footer-content')
    </footer>

</body>
</html>
