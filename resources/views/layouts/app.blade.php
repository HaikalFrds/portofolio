<! DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My Portfolio') - Haikal Firdaus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 antialiased">
    <header class="sticky top-0 z-20 border-b border-slate-800 bg-slate-950/80 backdrop-blur">
        <nav class="mx-auto flex max-w-5xl items-center justify-between px-6 py-4">
            <a href="{{ route('home') }}" class="text-lg font-semibold tracking-tight">Haikal Firdaus<span class="text-indigo-400">.</span></a>
            <div class="flex items-center gap-6 text-sm text-slate-300">
                <a href="{{ route('home') }}" class="hover:text-white">Home</a>
                <a href="{{ route('projects.index') }}" class="hover:text-white">Projects</a>
                <a href="{{ route('about') }}" class="hover:text-white">About</a>
                <a href="{{ route('contact') }}" class="hover:text-white">Contact</a>
            </div>
        </nav>
    </header>

    <main class="mx-auto max-w-5xl px-6 py-12">
        @yield('content')
    </main>

    <footer class="border-t border-slate-800 py-8 text-center text-sm text-slate-500">
        © {{ date('Y') }} Haikal Firdaus. Built with Laravel.
    </footer>
</body>
</html>