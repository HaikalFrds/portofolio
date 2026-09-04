@php
    // Nilainya berasal dari config/portfolio.php — ubah di sana, bukan di sini.
    $socials = [
        [
            'label' => 'GitHub',
            'url' => config('portfolio.github'),
            'icon' => 'M12 2C6.48 2 2 6.48 2 12c0 4.42 2.87 8.17 6.84 9.49.5.09.68-.22.68-.48 0-.24-.01-.87-.01-1.7-2.78.6-3.37-1.34-3.37-1.34-.45-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.61.07-.61 1 .07 1.53 1.03 1.53 1.03.89 1.53 2.34 1.09 2.91.83.09-.65.35-1.09.63-1.34-2.22-.25-4.56-1.11-4.56-4.94 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.27.1-2.65 0 0 .84-.27 2.75 1.02A9.6 9.6 0 0 1 12 6.8c.85 0 1.71.11 2.51.33 1.91-1.29 2.75-1.02 2.75-1.02.55 1.38.2 2.4.1 2.65.64.7 1.03 1.59 1.03 2.68 0 3.84-2.34 4.69-4.57 4.94.36.31.68.92.68 1.85 0 1.34-.01 2.42-.01 2.75 0 .27.18.58.69.48A10.01 10.01 0 0 0 22 12c0-5.52-4.48-10-10-10z',
        ],
        [
            'label' => 'LinkedIn',
            'url' => config('portfolio.linkedin'),
            'icon' => 'M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM2.4 21.5h5.16V9.75H2.4V21.5zM9.9 9.75h4.95v1.6h.07c.69-1.24 2.37-2.55 4.88-2.55 5.22 0 6.18 3.28 6.18 7.55v5.15h-5.15v-4.57c0-1.09-.02-2.5-1.57-2.5-1.57 0-1.81 1.19-1.81 2.42v4.65H9.9V9.75z',
        ],
        [
            'label' => 'Email',
            'url' => 'mailto:'.config('portfolio.email'),
            'icon' => 'M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 4.24-8 4.72-8-4.72V6l8 4.72L20 6v2.24z',
        ],
    ];
@endphp

<div class="flex items-center gap-2">
    @foreach ($socials as $social)
        <a href="{{ $social['url'] }}"
           @if (! str_starts_with($social['url'], 'mailto:')) target="_blank" rel="noopener noreferrer" @endif
           aria-label="{{ $social['label'] }}"
           class="flex h-9 w-9 items-center justify-center rounded-xl border border-ink/15 text-ink/70 transition-colors hover:border-ink/30 hover:bg-ink/5 hover:text-ink">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="{{ $social['icon'] }}"/>
            </svg>
        </a>
    @endforeach
</div>
