@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <section class="py-12">
        <h1 class="text-4xl font-bold tracking-tight text-white sm:text-5xl">
            Haikal Firdaus
        </h1>
        <p class="mt-4 max-w-2xl text-lg text-slate-400">
            Web Developer & Machine Learning Enthusiast. Kumpulan project yang sudah saya buat.
        </p>
        <div class="mt-6 flex gap-3">
            <a href="{{ route('projects.index') }}" class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-500">Lihat Projects</a>
            <a href="{{ route('contact') }}" class="rounded-lg border border-slate-700 px-5 py-2.5 text-sm font-medium text-slate-200 hover:bg-slate-900">Kontak</a>
        </div>
    </section>

    <section class="mt-8">
        <div class="mb-6 flex items-center justify-between">
            <h2 class="text-xl font-semibold text-white">Featured Projects</h2>
            <a href="{{ route('projects.index') }}" class="text-sm text-indigo-400 hover:text-indigo-300">Semua →</a>
        </div>
        @if ($featured->isEmpty())
            <p class="text-slate-500">Belum ada featured project.</p>
        @else
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($featured as $project)
                    @include('partials.project-card')
                @endforeach
            </div>
        @endif
    </section>
@endsection