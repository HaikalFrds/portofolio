@extends('layouts.app')
@section('title', 'Experiences')

@section('content')
    <section class="mx-auto max-w-4xl px-6 pt-14 pb-8">
        <h1 class="display-lg font-extrabold uppercase">Experiences</h1>
    </section>

    <section class="mx-auto max-w-4xl px-6 py-8">
        @if ($experiences->isEmpty())
            <p class="text-ink/50">Belum ada experience.</p>
        @else
            <ol class="relative border-l border-ink/15">
                @foreach ($experiences as $exp)
                    <li class="mb-12 ml-6" data-aos="fade-up" data-aos-once="true">
                        {{-- titik timeline --}}
                        <span class="absolute -left-[5px] mt-2 h-2.5 w-2.5 rounded-full {{ $exp->is_current ? 'bg-ink' : 'bg-ink/30' }}"></span>

                        <div class="flex flex-wrap items-baseline gap-x-3 gap-y-1">
                            <h2 class="text-lg font-bold tracking-tight">{{ $exp->role }}</h2>
                            @if ($exp->is_current)
                                <span class="rounded-full bg-ink px-2.5 py-0.5 text-xs font-medium text-cream">Now</span>
                            @endif
                        </div>

                        <p class="mt-1 text-ink/70">
                            {{ $exp->organization }}@if ($exp->location) · {{ $exp->location }}@endif
                        </p>

                        <p class="mt-1 text-sm text-ink/50">
                            {{ $exp->start_date->translatedFormat('M Y') }} —
                            {{ $exp->end_date?->translatedFormat('M Y') ?? 'Sekarang' }}
                        </p>

                        @if ($exp->description)
                            <p class="mt-4 leading-relaxed text-ink/80">{{ $exp->description }}</p>
                        @endif

                        @if ($exp->highlights)
                            <ul class="mt-4 list-disc space-y-1.5 pl-5 text-ink/80 marker:text-ink/30">
                                @foreach ($exp->highlights as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ol>
        @endif
    </section>
@endsection