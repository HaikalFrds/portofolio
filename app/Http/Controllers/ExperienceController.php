<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    public function index(): View
    {
        $experiences = Experience::query()
            ->published()
            ->ordered()
            ->get();

        return view('experiences.index', compact('experiences'));
    }
}