<a href="{{ route('projects.show', $project) }}" class="group block">
    <div class="overflow-hidden rounded-2xl border border-ink/10 bg-ink/[0.03]">
        @if ($project->thumbnail)
            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}"
                 class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105">
        @else
            <div class="flex aspect-[4/3] w-full items-center justify-center bg-ink/5 text-ink/20">
                <span class="text-6xl font-extrabold uppercase">{{ substr($project->title, 0, 1) }}</span>
            </div>
        @endif
    </div>
    <div class="mt-4 flex items-start justify-between gap-4">
        <div>
            <h3 class="text-lg font-bold tracking-tight group-hover:opacity-60">{{ $project->title }}</h3>
            <p class="mt-1 text-sm text-ink/60">{{ $project->summary }}</p>
        </div>
        <span class="shrink-0 rounded-full border border-ink/15 px-3 py-1 text-xs font-medium uppercase tracking-wide">{{ $project->category }}</span>
    </div>
</a>