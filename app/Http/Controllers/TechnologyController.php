<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\View\View;

class TechnologyController extends Controller
{
    public function index(): View
    {
        $technologies = Technology::query()
            ->published()
            ->ordered()
            ->get();

        return view('technologies.index', compact('technologies'));
    }
}