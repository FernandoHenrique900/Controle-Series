<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        /*
         *SEM O USO DA MODEL SERIE - NECESSITA DO CODIGO SQL-C/ A MODEL SERIE CONEXAO AO DB MAIS FACIL
        $series = DB::select('SELECT nome FROM series;');
         *
        */
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso'); //msg geral

        return view('series.index')->with('series', $series)
        ->with('mensagemSucesso', $mensagemSucesso); //passando o caminho da view <-Blade->
    }
    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Series::create($request->all()); //no request pode usar only/except p/casos diferentes.

        // $nomeSerie = $request->input('nome');
        // $serie = new Serie();
        // $serie->nome = $nomeSerie;
        // $serie->save();

        /*
        *SEM O USO DA MODEL SERIE - NECESSITA DO CODIGO SQL-C/ A MODEL SERIE CONEXAO AO DB MAIS FACIL
        DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);
        */
        return to_route('series.index')
        ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
       }

       public function destroy(Series $series,Request $request)//dois parametros na action
       {
        //dd ($request->route()); dump and die p/teste
        $series->delete();

        return to_route('series.index')
        ->with('mensagem.sucesso'," Série '{$series->nome}' removida com sucesso");
       }
       
       public function edit(Series $series)
       //definição da rota é series/{serie}/edit
       {
        //dd($series -> temporadas);
        return view('series.edit')->with('serie', $series);

       }
       public function update(Series $series, SeriesFormRequest $request)
       {
        //$series->nome = $request->nome;
        $series->fill($request->all()); //atributo fillable que filtra e só add oq é necessário
        $series->save();

        return to_route('series.index')
        ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso!");

       }
}
