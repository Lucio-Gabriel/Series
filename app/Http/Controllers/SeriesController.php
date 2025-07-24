<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
    }

    public function index(Request $request)
    {
        $series = Serie::all();
        $successMessage = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('successMessage', $successMessage);
    }

    public function create(): View
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = $this->repository->add($request);

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
