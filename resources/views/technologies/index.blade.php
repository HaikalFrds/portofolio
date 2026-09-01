@extends('layouts.app')
@section('title', 'Technologies')

@section('content')
    <section class="mx-auto max-w-5xl px-6 pt-14 pb-8">
        <h1 class="display-lg font-extrabold uppercase">Technologies</h1>
        <p class="mt-5 max-w-2xl text-lg text-ink/70">
            Tools and technologies I work with across web development and data science.
        </p>
    </section>

    <section class="mx-auto max-w-5xl px-6 py-8">
        @if ($technologies->isEmpty())
            <p class="text-ink/50">No technologies yet.</p>
        @else
            <div class="flex flex-wrap gap-3">
                @foreach ($technologies as $tech)
                    <span data-aos="fade-up" data-aos-once="true" data-aos-delay="{{ min($loop->index * 40, 400) }}"
                          class="flex items-center gap-2 rounded-full border border-ink/15 bg-ink/[0.03] px-4 py-2 text-sm font-medium">
                        <img src="{{ $tech->icon_url }}" alt="" loading="lazy" class="h-4 w-4">
                        {{ $tech->name }}
                    </span>
                @endforeach
            </div>
        @endif
    </section>
@endsection