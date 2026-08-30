@extends('layouts.app')
@section('title', 'Home')

@section('content')
    {{-- HERO --}}
    <section class="mx-auto max-w-6xl px-6 pt-16 pb-12">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-ink/50">Web Developer & ML Enthusiast</p>
        <h1 class="mt-6 font-extrabold uppercase leading-[0.9] tracking-tight" data-parallax="0.15"
            style="font-size: clamp(2.75rem, 12vw, 11rem);">
            Haikal<br>Firdaus
        </h1>
    </section>

    {{-- ABOUT --}}
    <section id="about" class="mx-auto max-w-6xl scroll-mt-24 px-6 py-20">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-ink/50">About</p>
        <p data-aos="fade-up" class="mt-6 max-w-3xl text-2xl font-medium leading-snug sm:text-3xl">
            I'm Haikal, an Information Systems & Technology student at Jakarta State University, building across data science and full-stack web development.
        </p>
    </section>

    {{-- FEATURED WORK --}}
    <section id="work" class="mx-auto max-w-6xl scroll-mt-24 px-6 py-8">
        <div class="mb-10 flex items-end justify-between border-b border-ink/10 pb-4">
            <h2 class="text-3xl font-bold uppercase tracking-tight">Featured Work</h2>
            <a href="{{ route('projects.index') }}" class="text-sm font-medium hover:opacity-60">View All →</a>
        </div>
        @if ($featured->isEmpty())
            <p class="text-ink/50">Belum ada featured project.</p>
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
    <section id="contact" class="mx-auto max-w-6xl scroll-mt-24 px-6 py-24">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-ink/50">Let's talk</p>
        <h2 data-aos="fade-up" class="mt-6 font-extrabold uppercase leading-none tracking-tight" style="font-size: clamp(2.5rem, 9vw, 7rem);">Contact</h2>
        <div data-aos="fade-up" data-aos-delay="100" class="mt-10 space-y-4 text-xl text-ink/80">
            <p>Email: <a href="mailto:haikalfirdausfisika@gmail.com" class="underline hover:opacity-60">haikalfirdausfisika@gmail.com</a></p>
            <p>(Tambah LinkedIn / GitHub di sini.)</p>
        </div>
    </section>
@endsection