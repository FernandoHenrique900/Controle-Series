<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        /*
         *SEM O USO DA MODEL SERIE - NECESSITA DO CODIGO SQL-C/ A MODEL SERIE CONEXAO AO DB MAIS FACIL
        $series = DB::select('SELECT nome FROM series;');
         *
        */
        $series = Serie::query()->orderBy('nome')->get();
        
        return view('series.index')->with('series', $series); //passando o caminho da view <-Blade->
    }
    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Serie::create($request->all()); //no request pode usar only/except p/casos diferentes.

        // $nomeSerie = $request->input('nome');
        // $serie = new Serie();
        // $serie->nome = $nomeSerie;
        // $serie->save();

        /*
        *SEM O USO DA MODEL SERIE - NECESSITA DO CODIGO SQL-C/ A MODEL SERIE CONEXAO AO DB MAIS FACIL
        DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);
        */
        return to_route('series.index');
       }

       public function destroy(Request $request)
       {

        //dd ($request->route()); dump and die p/teste
        Serie::destroy($request->series);

        return to_route('series.index');
       }
}
