@extends('layouts.app')
@section('title', 'Projects')

@section('content')
    <h1 class="text-3xl font-bold text-white">Projects</h1>

    <div class="mt-6 flex flex-wrap gap-2">
        <a href="{{ route('projects.index') }}"
           class="rounded-full px-3 py-1 text-sm {{ ! $category ? 'bg-indigo-600 text-white' : 'bg-slate-800 text-slate-300 hover:bg-slate-700' }}">
            All
        </a>
        @foreach ($categories as $cat)
            <a href="{{ route('projects.index', ['category' => $cat]) }}"
               class="rounded-full px-3 py-1 text-sm uppercase {{ $category === $cat ? 'bg-indigo-600 text-white' : 'bg-slate-800 text-slate-300 hover:bg-slate-700' }}">
                {{ $cat }}
            </a>
        @endforeach
    </div>

    @if ($projects->isEmpty())
        <p class="mt-8 text-slate-500">Belum ada project.</p>
    @else
        <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($projects as $project)
                @include('partials.project-card')
            @endforeach
        </div>
    @endif
@endsection