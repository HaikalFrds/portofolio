@php
    $end = $exp->end_date ?? now();
    $months = $exp->start_date->diffInMonths($end) + 1;
    $years = intdiv($months, 12);
    $remainingMonths = $months % 12;
    $duration = trim(
        ($years ? $years.' yr ' : '').
        ($remainingMonths ? $remainingMonths.' mo' : '')
    );

    // versi ringkas dipakai di home: tanpa deskripsi & highlight
    $compact = $compact ?? false;
@endphp

<li class="relative" data-aos="fade-up" data-aos-once="true">
    {{-- penanda di garis waktu; yang masih berjalan dibuat pekat --}}
    <span class="absolute -left-[calc(2rem+5px)] top-2 h-2.5 w-2.5 rounded-full ring-4 ring-cream {{ $exp->is_current ? 'bg-ink' : 'bg-ink/30' }}"></span>

    <div class="flex items-start gap-4">
        @if ($exp->logo)
            <img src="{{ asset('storage/'.$exp->logo) }}" alt="{{ $exp->organization }}"
                 class="h-12 w-12 shrink-0 rounded-xl border border-ink/10 bg-white object-contain p-1.5">
        @else
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl border border-ink/10 bg-white text-lg font-bold text-neutral-400">
                {{ strtoupper(substr($exp->organization, 0, 1)) }}
            </span>
        @endif

        <div class="min-w-0 flex-1">
            <div class="flex flex-wrap items-center gap-x-3 gap-y-2">
                <h3 class="text-lg font-bold tracking-tight">{{ $exp->role }}</h3>

                <span class="rounded-full border border-ink/15 px-2.5 py-0.5 text-xs font-medium uppercase tracking-wide text-ink/60">
                    {{ $exp->type }}
                </span>

                @if ($exp->is_current)
                    <span class="rounded-full bg-ink px-2.5 py-0.5 text-xs font-medium text-cream">Now</span>
                @endif
            </div>

            <p class="mt-1.5 text-ink/70">
                {{ $exp->organization }}@if ($exp->location) · {{ $exp->location }}@endif
            </p>

            <p class="mt-1 text-sm text-ink/50">
                {{ $exp->start_date->translatedFormat('M Y') }} —
                {{ $exp->end_date?->translatedFormat('M Y') ?? 'Present' }}
                @if ($duration)
                    <span class="text-ink/30">·</span> {{ $duration }}
                @endif
            </p>

            @unless ($compact)
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
            @endunless
        </div>
    </div>
</li>