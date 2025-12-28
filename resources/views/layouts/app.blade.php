<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">

    <!-- TOP NAVIGATION -->
    <nav class="bg-gray-900 border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-6 py-4 flex flex-wrap gap-4">

            <a href="{{ route('dashboard') }}"
               class="px-4 py-2 border border-white rounded text-white
                      hover:bg-white hover:text-black transition">
                Dashboard
            </a>

            <a href="{{ route('bookings.index') }}"
               class="px-4 py-2 border border-white rounded text-white
                      hover:bg-white hover:text-black transition">
                My Bookings
            </a>

            @if(Auth::check() && Auth::user()->role === 'admin')
                <a href="{{ route('admin.bookings.index') }}"
                   class="px-4 py-2 border border-white rounded text-white
                          hover:bg-white hover:text-black transition">
                    Admin Panel
                </a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="px-4 py-2 border border-white rounded text-white
                               hover:bg-white hover:text-black transition">
                    Logout
                </button>
            </form>

        </div>
    </nav>

    <!-- PAGE HEADER -->
    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-6">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- PAGE CONTENT -->
    <main class="py-6">
        {{ $slot }}
    </main>

</div>
</body>
</html>
