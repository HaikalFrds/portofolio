<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\view\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featured = Project::query()
            ->published()
            ->featured()
            ->ordered()
            ->get();

        return view('home', compact('featured'));
    }
}
