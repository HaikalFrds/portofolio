@extends('layouts.app')
@section('title', 'Work')

@section('content')
    <section class="mx-auto max-w-5xl px-6 pt-14 pb-8">
        <h1 class="display-lg font-extrabold uppercase">Work</h1>

        <div class="mt-8 flex flex-wrap gap-2">
            <a href="{{ route('projects.index') }}"
               class="rounded-full px-4 py-2 text-sm font-medium {{ ! $category ? 'bg-ink text-cream' : 'border border-ink/15 hover:bg-ink hover:text-cream' }}">All</a>
            @foreach ($categories as $cat)
                <a href="{{ route('projects.index', ['category' => $cat]) }}"
                   class="rounded-full px-4 py-2 text-sm font-medium uppercase {{ $category === $cat ? 'bg-ink text-cream' : 'border border-ink/15 hover:bg-ink hover:text-cream' }}">{{ $cat }}</a>
            @endforeach
        </div>
    </section>

    <section class="mx-auto max-w-5xl px-6 py-8">
        @if ($projects->isEmpty())
            <p class="text-ink/50">No projects yet.</p>
        @else
            <div class="grid gap-8 sm:grid-cols-2">
                @foreach ($projects as $project)
                    @include('partials.project-card')
                @endforeach
            </div>
        @endif
    </section>
@endsection