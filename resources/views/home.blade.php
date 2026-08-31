@extends('layouts.app')
@section('title', 'Home')

@section('content')
    {{-- HERO --}}
    <section class="mx-auto max-w-5xl px-6 pt-14 pb-10">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-ink/50">Web Developer & ML Enthusiast</p>
        <h1 class="display-xl mt-5 font-extrabold uppercase" data-parallax="0.15">
            Haikal<br>Firdaus
        </h1>
    </section>

    {{-- ABOUT --}}
    <section id="about" class="mx-auto max-w-5xl scroll-mt-24 px-6 py-16">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-ink/50">About</p>
        <p data-aos="fade-up" class="mt-5 max-w-2xl text-lg leading-relaxed text-ink/80 sm:text-xl">
            I'm Haikal, an Information Systems & Technology student at Jakarta State University, building across data science and full-stack web development.
        </p>
    </section>

    @include('partials.github-activity')

    {{-- FEATURED WORK --}}
    <section id="work" class="mx-auto max-w-5xl scroll-mt-24 px-6 py-8">
        <div class="mb-8 flex items-end justify-between border-b border-ink/10 pb-4">
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

    {{-- CONTACT --}}
    <section id="contact" class="mx-auto max-w-5xl scroll-mt-24 px-6 py-16">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-ink/50">Let's talk</p>
        <h2 data-aos="fade-up" class="display-lg mt-5 font-extrabold uppercase">Contact</h2>
        <div data-aos="fade-up" data-aos-delay="100" class="mt-8">
            <a href="mailto:haikalfirdaus498@gmail.com" class="text-lg underline underline-offset-4 hover:opacity-60">
                haikalfirdaus498@gmail.com
            </a>
            <div class="mt-6">
                @include('partials.social-links')
            </div>
        </div>
    </section>
@endsection
