@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <section class="mx-auto max-w-6xl px-6 pt-16 pb-12">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-ink/50">Web Developer & ML Enthusiast</p>
        <h1 class="mt-6 font-extrabold uppercase leading-[0.9] tracking-tight"
            style="font-size: clamp(2.75rem, 12vw, 11rem);">
            Haikal<br>Firdaus
        </h1>
        <div class="mt-8 flex flex-wrap items-center gap-4">
            <a href="{{ route('projects.index') }}" class="rounded-full bg-ink px-6 py-3 text-sm font-medium text-cream hover:opacity-80">Lihat Work</a>
            <a href="{{ route('contact') }}" class="rounded-full border border-ink/20 px-6 py-3 text-sm font-medium hover:bg-ink hover:text-cream">Kontak</a>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-6 py-16">
        <p class="max-w-3xl text-2xl font-medium leading-snug sm:text-3xl">
            I'm Haikal, an Information Systems & Technology student at Jakarta State University, building across data science and full-stack web development.
        </p>
    </section>

    <section class="mx-auto max-w-6xl px-6 py-8">
        <div class="mb-10 flex items-end justify-between border-b border-ink/10 pb-4">
            <h2 class="text-3xl font-bold uppercase tracking-tight">Featured Work</h2>
            <a href="{{ route('projects.index') }}" class="text-sm font-medium hover:opacity-60">View All →</a>
        </div>
        @if ($featured->isEmpty())
            <p class="text-ink/50">Belum ada featured project.</p>
        @else
            <div class="grid gap-8 sm:grid-cols-2">
                @foreach ($featured as $project)
                    @include('partials.project-card')
                @endforeach
            </div>
        @endif
    </section>
@endsection