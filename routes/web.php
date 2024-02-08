<?php

use App\Http\Controllers\EnderecoController;



Route::get('/', function () {
    view('welcome');
});

Route::get('/dominiotipocontato', 'DominioTipoContatoController@index')->name('dominio.tipo.contato.index');
Route::get('/dominiotipocontato/show/{id}', 'DominioTipoContatoController@show')->name('dominio.tipo.contato.show');
Route::get('/dominiotipocontato/create', 'DominioTipoContatoController@create')->name('dominio.tipo.contato.create');

Route::post('/dominiotipocontato/store', 'DominioTipoContatoController@store')->name('dominio.tipo.contato.store');



















//--------------------------------------------------------------


Route::get('contatos', 'ContatoController@index');
Route::get('contatos/show/{id}', 'ContatoController@show');
Route::get('contatos/create', 'ContatoController@create');
Route::get('contatos/show/{id}/edit', 'ContatoController@edit');




Route::resource('enderecos', EnderecoController::class);
//Route::resource('enderecos', 'EnderecoController');
//Route::get('enderecos/index', 'EnderecoController@index');








Route::get('tipocontato/index', 'DominioTipoContatoController@index');

/*
 * pra rodar o app tu pracisa rodar o comando
 * php artisan serve
 * prerquisitos é o composer (composer install)
 * nodes.js (via chocolatery)
 * criar uma app key
 * compilar js e css: npm run prod
 * 
 * 
 * criar uma migration para adicionar uma coluna de 'estado' na tabela de endereco
 * criar migration para alterar o nome da FK 'pessoa' para 'id_pessoa' na tabela contato. Fazer o mesmo para tipo_contato
 * fazer uma migration (por tabela) para alterar o nome das PK's para 'id'
 */

