<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\GithubContributions;
use Illuminate\View\View;

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

        return view('home', compact('featured', 'contributions'));
    }
}