@extends('layouts.app')
@section('title', $project->title)

@section('content')
    <article class="mx-auto max-w-4xl px-6 pt-12 pb-8">
        <a href="{{ route('projects.index') }}" class="text-sm font-medium text-ink/50 hover:text-ink">← All Work</a>

        <div class="mt-6 flex items-center gap-3">
            <span class="rounded-full border border-ink/15 px-3 py-1 text-xs font-medium uppercase tracking-wide">{{ $project->category }}</span>
            @if ($project->featured)<span class="text-xs font-medium text-ink/40">★ Featured</span>@endif
        </div>

        <h1 class="mt-4 font-extrabold uppercase leading-[0.95] tracking-tight" style="font-size: clamp(2.25rem, 7vw, 5rem);">{{ $project->title }}</h1>
        <p class="mt-5 max-w-2xl text-xl text-ink/70">{{ $project->summary }}</p>

        <div class="mt-6 flex flex-wrap gap-3">
            @if ($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="rounded-full bg-ink px-5 py-2.5 text-sm font-medium text-cream hover:opacity-80">Live Demo</a>
            @endif
            @if ($project->repo_url)
                <a href="{{ $project->repo_url }}" target="_blank" rel="noopener" class="rounded-full border border-ink/20 px-5 py-2.5 text-sm font-medium hover:bg-ink hover:text-cream">Repository</a>
            @endif
        </div>

        @if ($project->thumbnail)
            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}"
                 class="mt-10 w-full rounded-2xl border border-ink/10 object-cover">
        @endif

        @if ($project->tech_stack)
            <div class="mt-8 flex flex-wrap gap-2">
                @foreach ($project->tech_stack as $tech)
                    <span class="rounded-full bg-ink/5 px-3 py-1 text-sm">{{ $tech }}</span>
                @endforeach
            </div>
        @endif

        @if ($project->description)
            <div class="mt-8 whitespace-pre-line text-lg leading-relaxed text-ink/80">{{ $project->description }}</div>
        @endif

        @if ($project->meta)
            <div class="mt-10 rounded-2xl border border-ink/10 bg-white p-6">
                <h2 class="mb-4 text-sm font-semibold uppercase tracking-wide text-ink/50">Detail</h2>
                <dl class="grid gap-4 sm:grid-cols-2">
                    @foreach ($project->meta as $key => $value)
                        @if ($value)
                            <div>
                                <dt class="text-xs uppercase text-ink/40">{{ str_replace('_', ' ', $key) }}</dt>
                                <dd class="text-ink">{{ $value }}</dd>
                            </div>
                        @endif
                    @endforeach
                </dl>
            </div>
        @endif
    </article>
@endsection