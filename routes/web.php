<?php

use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/series');
});

Route::resource('/series', SeriesController::class)
->except(['show']);

//->only(['index', 'create', 'store','destroy', 'edit', 'update']); //Controla geral todas as rotas (PODE USAR O METODO ONLY PRA DEIFINIR SOMENTE AS EXISTENTES)

// Route::controller(SeriesController::class)->group(function(){
//      Route::get('/series', 'index')->name('series.index');
//      Route::get('/series/create', 'create')->name('series.create');
//      Route::get('/series/salvar', 'store')->name('series.store');

//});


Route::get('/series/{series}/seasons',[SeasonsController::class, 'index'])->name('seasons.index');
