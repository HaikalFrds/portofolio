@extends('layouts.app')
@section('title', $project->title)

@section('content')
    <a href="{{ route('projects.index') }}" class="text-sm text-slate-400 hover:text-white">← Semua projects</a>

    <div class="mt-4 flex items-center gap-2">
        <span class="rounded-full bg-indigo-500/10 px-2.5 py-0.5 text-xs font-medium uppercase tracking-wide text-indigo-300">{{ $project->category }}</span>
        @if ($project->featured)<span class="text-xs text-amber-400">★ featured</span>@endif
    </div>

    <h1 class="mt-3 text-3xl font-bold text-white">{{ $project->title }}</h1>
    <p class="mt-3 text-lg text-slate-400">{{ $project->summary }}</p>

    @if ($project->tech_stack)
        <div class="mt-4 flex flex-wrap gap-1.5">
            @foreach ($project->tech_stack as $tech)
                <span class="rounded bg-slate-800 px-2 py-0.5 text-xs text-slate-300">{{ $tech }}</span>
            @endforeach
        </div>
    @endif

    <div class="mt-6 flex gap-3">
        @if ($project->demo_url)
            <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500">Live Demo</a>
        @endif
        @if ($project->repo_url)
            <a href="{{ $project->repo_url }}" target="_blank" rel="noopener" class="rounded-lg border border-slate-700 px-4 py-2 text-sm font-medium text-slate-200 hover:bg-slate-900">Repository</a>
        @endif
    </div>

    @if ($project->description)
        <div class="mt-8 whitespace-pre-line leading-relaxed text-slate-300">{{ $project->description }}</div>
    @endif

    @if ($project->meta)
        <div class="mt-8 rounded-xl border border-slate-800 bg-slate-900/50 p-5">
            <h2 class="mb-3 text-sm font-semibold uppercase tracking-wide text-slate-400">Detail</h2>
            <dl class="grid gap-3 sm:grid-cols-2">
                @foreach ($project->meta as $key => $value)
                    @if ($value)
                        <div>
                            <dt class="text-xs uppercase text-slate-500">{{ str_replace('_', ' ', $key) }}</dt>
                            <dd class="text-sm text-slate-200">{{ $value }}</dd>
                        </div>
                    @endif
                @endforeach
            </dl>
        </div>
    @endif
@endsection