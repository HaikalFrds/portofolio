<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Portofolio') - Haikal Firdaus</title>
    <script>
        (function () {
            const stored = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            document.documentElement.classList.toggle('dark', stored ? stored === 'dark' : prefersDark);
        })();
    </script>
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
                <button type="button" data-theme-toggle aria-label="Toggle theme"
                    class="flex h-9 w-9 items-center justify-center rounded-xl border border-ink/15 transition-colors hover:border-ink/30 hover:bg-ink/5">
                <svg class="h-4 w-4 dark:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <circle cx="12" cy="12" r="4"/>
                    <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                </svg>
                <svg class="hidden h-4 w-4 dark:block" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                </svg>
            </button>
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