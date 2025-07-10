<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('name')->get();
        $successMessage = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('successMessage', $successMessage);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());
        $request->session()->flash('mensagem.sucesso', "Serie {$serie->name} criada com sucesso.");

        return redirect(route('series.index'));
    }

    public function destroy(Serie $serie, Request $request)
    {
        $serie->delete();
        $request->session()->flash('mensagem.sucesso', "Serie {$serie->name} removida com sucesso.");

        return redirect(route('series.index')); 
    }
}
