<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SeriesController extends Controller
{
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
        $serie = Serie::create($request->all());

        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i,
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $episodes [] = [
                    'season_id' => $season->id,
                    'number' => $j,
                ];
            }
        }

        Episode::insert($episodes);

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
