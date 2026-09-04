@extends('layouts.app')
@section('title', 'Experiences')

@section('content')
    <section class="mx-auto max-w-4xl px-6 pt-14 pb-8">
        <h1 class="display-lg font-extrabold uppercase">Experiences</h1>
        <p class="mt-5 max-w-2xl text-lg text-ink/70">
            Work, internships, and organizations I've been part of.
        </p>
    </section>

    <section class="mx-auto max-w-4xl px-6 py-8">
        @if ($experiences->isEmpty())
            <p class="text-ink/50">No experiences yet.</p>
        @else
            <ol class="relative space-y-12 border-l border-ink/15 pl-8">
                @foreach ($experiences as $exp)
                    @include('partials.experience-item', ['exp' => $exp])
                @endforeach
            </ol>
        @endif
    </section>
@endsection