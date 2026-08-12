<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\view\View;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $category = $request->query('category');

        $projects = Project::query()
            ->published()
            ->when($category, fn ($q) => $q->where('category_id', $category))
            ->ordered()
            ->get();

        $categories = Project::query()
            ->published()
            ->orderBy('category')
            ->distinct()
            ->pluck('category');

        return view('projects.index', compact('projects', 'categories', 'category'));
    }

    public function show(Project $project): View
    {
        abort_unless($project->published, 404);

        return view('projects.show', compact('project'));
    }
}
