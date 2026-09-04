@extends('layouts.app')
@section('title', 'Home')

@section('content')
    {{-- HERO --}}
    <section id="about" class="mx-auto max-w-5xl scroll-mt-24 px-6 pt-14 pb-12">
        <div class="flex items-center gap-5">
            <img src="{{ asset('images/avatar.jpg') }}" alt="Haikal Firdaus"
                class="h-32 w-32 shrink-0 rounded-full border border-ink/15 object-cover sm:h-40 sm:w-40">
            <div>
                <h1 class="text-2xl font-bold tracking-tight sm:text-3xl">Haikal Firdaus</h1>
                <div class="mt-3">
                    @include('partials.social-links')
                </div>
            </div>
        </div>

        <p data-aos="fade-up" class="mt-10 text-3xl font-bold leading-tight tracking-tight sm:text-4xl">
            Full-Stack Web Developer
            <span class="text-ink/40">— Laravel &amp; Machine Learning</span>
        </p>

        <p data-aos="fade-up" data-aos-delay="100" class="mt-6 max-w-3xl text-lg leading-loose text-ink/70">
            I'm an Information Systems &amp; Technology student at Universitas Negeri Jakarta. I build internal web applications with 
            <span class="inline-flex items-center gap-1.5 rounded-md bg-ink/[0.06] px-2 py-0.5 align-middle text-[0.85em] font-medium text-ink">
                <img src="https://cdn.simpleicons.org/laravel" alt="" loading="lazy" class="h-[1em] w-[1em]">Laravel
            </span> and 
            <span class="inline-flex items-center gap-1.5 rounded-md bg-ink/[0.06] px-2 py-0.5 align-middle text-[0.85em] font-medium text-ink">
                <img src="https://cdn.simpleicons.org/livewire" alt="" loading="lazy" class="h-[1em] w-[1em]">Livewire
            </span> on the web side, and train time series models in 
            <span class="inline-flex items-center gap-1.5 rounded-md bg-ink/[0.06] px-2 py-0.5 align-middle text-[0.85em] font-medium text-ink">
                <img src="https://cdn.simpleicons.org/python" alt="" loading="lazy" class="h-[1em] w-[1em]">Python
            </span> for forecasting problems. Most recently I built a production monitoring system for an automotive manufacturer, and a hotel revenue forecasting model that reached 7.9% MAPE.
        </p>

        <a href="{{ asset('files/cv.pdf') }}" target="_blank" rel="noopener"
           data-aos="fade-up" data-aos-delay="200"
           class="group mt-8 inline-flex items-center gap-2 rounded-full bg-ink px-6 py-3 text-sm font-medium text-cream transition-opacity hover:opacity-80">
            View Resume
            <svg class="h-4 w-4 transition-transform group-hover:translate-x-1"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="m9 18 6-6-6-6"/>
            </svg>
        </a>
    </section>
    
    {{-- TECHNOLOGIES --}}
    @include('partials.technologies')

    {{-- FEATURED WORK --}}
    <section id="work" class="mx-auto max-w-5xl scroll-mt-24 px-6 py-8">
        <div data-aos="fade-up" class="mb-8 flex items-end justify-between border-b border-ink/10 pb-4">
            <h2 class="text-2xl font-bold uppercase tracking-tight">Featured Work</h2>
            <a href="{{ route('projects.index') }}" class="text-sm font-medium hover:opacity-60">View All →</a>
        </div>
        @if ($featured->isEmpty())
            <p class="text-ink/50">No featured projects yet.</p>
        @else
            <div class="grid gap-8 sm:grid-cols-2">
                @foreach ($featured as $project)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        @include('partials.project-card')
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    {{-- EXPERIENCES --}}
    <section class="mx-auto max-w-5xl px-6 py-16">
        <div data-aos="fade-up" class="mb-8 flex items-end justify-between border-b border-ink/10 pb-4">
            <h2 class="text-2xl font-bold uppercase tracking-tight">Experiences</h2>
            <a href="{{ route('experiences.index') }}" class="text-sm font-medium hover:opacity-60">View All →</a>
        </div>

        @if ($experiences->isEmpty())
            <p class="text-ink/50">No experiences yet.</p>
        @else
            <ol class="relative space-y-10 border-l border-ink/15 pl-8">
                @foreach ($experiences as $exp)
                    @include('partials.experience-item', ['exp' => $exp, 'compact' => true])
                @endforeach
            </ol>
        @endif
    </section>

    {{-- GITHUB ACTIVITY --}}
    @include('partials.github-activity')

    {{-- CONTACT --}}
    <section id="contact" class="mx-auto max-w-5xl scroll-mt-24 px-6 py-16">
        <div class="grid gap-10 md:grid-cols-2 md:gap-16">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-ink/50">Let's talk</p>
                <h2 data-aos="fade-up" class="display-lg mt-5 font-extrabold uppercase">Let's work together</h2>
                <p data-aos="fade-up" data-aos-delay="100" class="mt-5 text-lg leading-relaxed text-ink/70">
                    Open to internships and collaboration in full-stack web development and machine learning. Feel free to reach out - I usually reply within a day.
                </p>
            </div>

            <div data-aos="fade-up" data-aos-delay="100" class="space-y-3 self-center">
                {{-- EMAIL --}}
                <a href="mailto:{{ config('portfolio.email') }}"
                   class="group flex items-center gap-4 rounded-2xl border border-ink/15 bg-ink/[0.03] p-4 transition-colors hover:border-ink/30 hover:bg-ink/[0.06]">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-ink/10">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 4.24-8 4.72-8-4.72V6l8 4.72L20 6v2.24z"/>
                        </svg>
                    </span>
                    <span class="min-w-0 flex-1">
                        <span class="block text-xs font-semibold uppercase tracking-[0.15em] text-ink/50">Email</span>
                        <span class="block truncate">{{ config('portfolio.email') }}</span>
                    </span>
                    <svg class="h-4 w-4 shrink-0 text-ink/30 transition-transform group-hover:translate-x-1"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </a>

                {{-- WHATSAPP --}}
                <a href="https://wa.me/{{ config('portfolio.whatsapp') }}" target="_blank" rel="noopener noreferrer"
                   class="group flex items-center gap-4 rounded-2xl border border-ink/15 bg-ink/[0.03] p-4 transition-colors hover:border-ink/30 hover:bg-ink/[0.06]">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-ink/10">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                        </svg>
                    </span>
                    <span class="min-w-0 flex-1">
                        <span class="block text-xs font-semibold uppercase tracking-[0.15em] text-ink/50">Let's talk</span>
                        <span class="block truncate">Chat with Me</span>
                    </span>
                    <svg class="h-4 w-4 shrink-0 text-ink/30 transition-transform group-hover:translate-x-1"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection
