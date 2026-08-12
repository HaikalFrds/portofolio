<a href="{{ route('projects.show', $project) }}"
   class="group flex flex-col rounded-xl border border-slate-800 bg-slate-900/50 p-5 transition hover:border-indigo-500/50 hover:bg-slate-900">
    <div class="mb-3 flex items-center gap-2">
        <span class="rounded-full bg-indigo-500/10 px-2.5 py-0.5 text-xs font-medium uppercase tracking-wide text-indigo-300">
            {{ $project->category }}
        </span>
        @if ($project->featured)
            <span class="text-xs text-amber-400">★ featured</span>
        @endif
    </div>
    <h3 class="text-lg font-semibold text-white group-hover:text-indigo-300">{{ $project->title }}</h3>
    <p class="mt-2 flex-1 text-sm text-slate-400">{{ $project->summary }}</p>
    @if ($project->tech_stack)
        <div class="mt-4 flex flex-wrap gap-1.5">
            @foreach ($project->tech_stack as $tech)
                <span class="rounded bg-slate-800 px-2 py-0.5 text-xs text-slate-300">{{ $tech }}</span>
            @endforeach
        </div>
    @endif
</a>