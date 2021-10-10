<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use Illuminate\Http\Request;
use App\Serie;

class SeriesController extends Controller
{

    public function index(Request $request)
    {

        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');


        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {

        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $nome = $request->nome;
        $serie = Serie::create([
            'nome' => $nome
        ]);

        echo "Série com id {$serie->id} criada: {$serie->nome}";
        $request->session()->flash('mensagem', "Série {$serie->id} criada com sucesso {$serie->nome}");

        return redirect()->route('listar_series');

        /*$serie = new Serie();
        $serie->nome = $nome;
        var_dump($serie->save());*/
    }

    public function destroy(Request $request)
    {

        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "A Série foi removida com sucesso");

        return redirect()->route('listar_series');
    }
}
