<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = [
            'Breaking bad',
            'MR Robot',
            'Prision Break',
            'The Walking Dead',
        ];

        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }
}
