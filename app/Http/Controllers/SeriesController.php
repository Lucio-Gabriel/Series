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
        Serie::create($request->all());
        $request->session()->flash('mensagem.sucesso', 'Serie criada com sucesso.');

        return redirect(route('series.index'));
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->serie);
        $request->session()->flash('mensagem.sucesso', 'Serie removida com sucesso.');

        return redirect(route('series.index'));
    }
}
