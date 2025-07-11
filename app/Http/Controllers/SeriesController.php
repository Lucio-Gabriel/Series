<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
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

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create($request->all());

        return redirect(route('series.index'))
            ->with('mensagem.sucesso', "Serie {$serie->name} criada com sucesso.");
    }

    public function edit(Serie $serie)
    {
        return view('series.edit')->with('serie', $serie);
    }

    public function update(Serie $serie, SeriesFormRequest $request)
    {
        $serie->fill($request->all());
        $serie->save();

        return redirect(route('series.index'))
            ->with('mensagem.sucesso', "Serie {$serie->name} atualizada com sucesso.");
    }

    public function destroy(Serie $serie)
    {
        $serie->delete();

        return redirect(route('series.index'))
            ->with('mensagem.sucesso', "Serie {$serie->name} removida com sucesso.");
    }
}
