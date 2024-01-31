<?php

use App\Http\Controllers\ContatoController;
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [ContatoController::class, 'index']);
Route::resource('contato', ContatoController::class);
