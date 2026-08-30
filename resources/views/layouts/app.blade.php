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
        <nav class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-6 py-4">
            <a href="{{ route('home') }}" aria-label="Home">
                @include('partials.logo')
            </a>

            <div class="flex items-center gap-2 sm:gap-6 text-sm font-medium">
                <a href="{{ route('projects.index') }}"
                   class="rounded-full px-3 py-2 transition-colors hover:bg-ink/5 {{ request()->routeIs('projects.*') ? 'text-ink' : 'text-ink/60' }}">
                    Work
                </a>
                <a href="{{ route('experiences.index') }}"
                   class="rounded-full px-3 py-2 transition-colors hover:bg-ink/5 {{ request()->routeIs('experiences.*') ? 'text-ink' : 'text-ink/60' }}">
                    Experiences
                </a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="mt-24 border-t border-ink/10">
        <div class="mx-auto max-w-6xl px-6 py-10 text-sm text-ink/50">
            © {{ date('Y') }} Haikal Firdaus
        </div>
    </footer>
</body>
</html>