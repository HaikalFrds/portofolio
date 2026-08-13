<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Portofolio') - Haikal Firdaus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-cream text-ink antialiased">
    <header class="sticky top-0 z-20 border-b border-ink/10 bg-cream/80 backdrop-blur">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-5">
            <a href="{{ route('home') }}" class="text-lg font-extrabold uppercase tracking-tight">Haikal</a>
            <div class="flex items-center gap-8 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:opacity-60">Home</a>
                <a href="{{ route('projects.index') }}" class="hover:opacity-60">Work</a>
                <a href="{{ route('about') }}" class="hover:opacity-60">About</a>
                <a href="{{ route('contact') }}" class="rounded-full bg-ink px-4 py-2 text-cream hover:opacity-80">Contact</a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="mt-24 border-t border-ink/10">
        <div class="mx-auto max-w-6xl px-6 py-10 text-sm text-ink/50">
            © {{ date('Y') }} Haikal Firdaus - Built with Laravel.
        </div>
    </footer>
</body>
</html>