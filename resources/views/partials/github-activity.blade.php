@if ($contributions)
    @php
        $weeks = $contributions['weeks'];
        $weekCount = count($weeks);

        // tandai kolom tempat tiap bulan dimulai, buat label di atas grafik
        $monthLabels = [];
        $lastMonth = null;
        foreach ($weeks as $index => $week) {
            $firstDate = $week['contributionDays'][0]['date'] ?? null;
            if (! $firstDate) {
                continue;
            }
            $month = date('n', strtotime($firstDate));
            if ($month !== $lastMonth) {
                $monthLabels[$index] = date('M', strtotime($firstDate));
                $lastMonth = $month;
            }
        }

        // buang label yang terlalu mepet dengan label sesudahnya, biar tidak bertabrakan
        $labelColumns = array_keys($monthLabels);
        foreach ($labelColumns as $i => $column) {
            $next = $labelColumns[$i + 1] ?? null;
            if ($next !== null && $next - $column < 3) {
                unset($monthLabels[$column]);
            }
        }

        $levelClass = [
            'FOURTH_QUARTILE' => 'bg-ink',
            'THIRD_QUARTILE' => 'bg-ink/70',
            'SECOND_QUARTILE' => 'bg-ink/45',
            'FIRST_QUARTILE' => 'bg-ink/25',
            'NONE' => 'bg-ink/[0.07]',
        ];
    @endphp

    <section class="mx-auto max-w-5xl px-6 py-16">
        <h2 data-aos="fade-up" class="mb-6 text-2xl font-bold uppercase tracking-tight">GitHub Activity</h2>

        <div data-aos="fade-up" data-aos-delay="100" class="rounded-2xl border border-ink/15 p-6">
            <div class="overflow-x-auto pb-1">
                {{-- kolomnya 1fr, jadi grafik melebar mengikuti lebar kotak --}}
                <div class="min-w-[680px]">
                    <div class="mb-2 grid text-xs text-ink/40"
                         style="grid-template-columns: repeat({{ $weekCount }}, minmax(0, 1fr))">
                        @foreach ($monthLabels as $column => $label)
                            <span class="col-span-4 row-start-1" style="grid-column-start: {{ $column + 1 }}">{{ $label }}</span>
                        @endforeach
                    </div>

                    <div class="grid grid-flow-col grid-rows-7 gap-[3px]"
                         style="grid-auto-columns: minmax(0, 1fr)">
                        @foreach ($weeks as $week)
                            @foreach ($week['contributionDays'] as $day)
                                <span
                                    @if ($loop->parent->first && $loop->first)
                                        {{-- minggu pertama sering tidak utuh: geser ke baris sesuai hari --}}
                                        style="grid-row-start: {{ (int) date('w', strtotime($day['date'])) + 1 }}"
                                    @endif
                                    class="aspect-square rounded-[2px] {{ $levelClass[$day['contributionLevel']] ?? $levelClass['NONE'] }}"
                                    title="{{ $day['contributionCount'] }} contributions on {{ $day['date'] }}"></span>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mt-5 flex flex-wrap items-center justify-between gap-3 text-sm text-ink/50">
                <p>{{ number_format($contributions['totalContributions']) }} contributions in the last year</p>

                <div class="flex items-center gap-1.5 text-xs">
                    <span>Less</span>
                    @foreach (['NONE', 'FIRST_QUARTILE', 'SECOND_QUARTILE', 'THIRD_QUARTILE', 'FOURTH_QUARTILE'] as $level)
                        <span class="h-3 w-3 rounded-[2px] {{ $levelClass[$level] }}"></span>
                    @endforeach
                    <span>More</span>
                </div>
            </div>
        </div>
    </section>
@endif