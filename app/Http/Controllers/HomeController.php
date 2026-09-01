<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\GithubContributions;
use Illuminate\View\View;
use App\Models\Technology;

class HomeController extends Controller
{
    public function index(GithubContributions $github): View
    {
        $featured = Project::query()
            ->published()
            ->featured()
            ->ordered()
            ->get();

        $contributions = $github->calendar();

        $technologies = Technology::query()
            ->published()
            ->ordered()
            ->get();

        return view('home', compact('featured', 'contributions', 'technologies'));
    }
}