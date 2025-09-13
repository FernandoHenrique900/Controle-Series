<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/series');
});

Route::get('/hail', function () {
    echo "Hail to the King";
    });

Route::controller(SeriesController::class)->group(function(){
    Route::get('/series', 'index');
    Route::get('/series/create', 'create')->name('series.create');
    Route::get('/series/salvar', 'store');

    // Route::get('/series',[SeriesController::class,'index']);
    // Route::get('/series/criar',[SeriesController::class,'create']); //rota do metodo create
    // Route::post('/series/salvar',[SeriesController::class,'store']);

});

