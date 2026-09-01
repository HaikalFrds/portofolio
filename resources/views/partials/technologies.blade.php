@if ($technologies->isNotEmpty())
    <section class="mx-auto max-w-5xl px-6 py-16">
        <div class="mb-8 flex items-end justify-between border-b border-ink/10 pb-4">
            <h2 class="text-2xl font-bold uppercase tracking-tight">Technologies</h2>
            <a href="{{ route('technologies.index') }}" class="text-sm font-medium hover:opacity-60">View All →</a>
        </div>
        <div class="space-y-3">
            @foreach ([1, 2] as $row)
                @php
                    $items = $technologies->where('row', $row)->values();

                    // gandakan sampai cukup panjang mengisi layar,
                    // lalu digandakan sekali lagi supaya sambungannya tak terlihat
                    $base = $items;
                    while ($base->isNotEmpty() && $base->count() < 10) {
                        $base = $base->concat($items);
                    }
                    $marquee = $base->concat($base);
                @endphp

                @if ($items->isNotEmpty())
                    <div class="marquee">
                        <div class="marquee-track gap-3 {{ $row === 1 ? 'marquee-track-left' : 'marquee-track-right' }}">
                            @foreach ($marquee as $tech)
                                <span class="flex shrink-0 items-center gap-2 rounded-full border border-ink/15 bg-ink/[0.03] px-4 py-2 text-sm font-medium">
                                    <img src="{{ $tech->icon_url }}" alt="" loading="lazy" class="h-4 w-4">
                                    {{ $tech->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endif