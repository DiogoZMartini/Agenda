<?php
use App\Http\Controllers\PessoaController;


Route::get('/', [PessoaController::class, 'index']);

Route::get('/dominiotipocontato', 'DominioTipoContatoController@index')->name('dominio.tipo.contato.index');
Route::get('/dominiotipocontato/show/{id}', 'DominioTipoContatoController@show')->name('dominio.tipo.contato.show');
Route::get('/dominiotipocontato/create', 'DominioTipoContatoController@create')->name('dominio.tipo.contato.create');
Route::post('/dominiotipocontato/store', 'DominioTipoContatoController@store')->name('dominio.tipo.contato.store');
Route::get('/dominiotipocontato/edit/{DominioTipoContato}', 'DominioTipoContatoController@edit')->name('dominio.tipo.contato.edit');
Route::put('/dominiotipocontato/update/{DominioTipoContato}', 'DominioTipoContatoController@update')->name('dominio.tipo.contato.update');
Route::delete('/dominiotipocontato/delete/{id}', 'DominioTipoContatoController@destroy')->name('dominio.tipo.contato.destroy');

Route::get('/pessoa', 'PessoaController@index')->name('pessoa.index');
Route::get('/pessoa/create', 'PessoaController@create')->name('pessoa.create');
Route::get('/pessoa/show/{id}', 'PessoaController@show')->name('pessoa.show');
Route::post('/pessoa/store', 'PessoaController@store')->name('pessoa.store');
Route::get('/pessoa/edit/{Pessoa}', 'PessoaController@edit')->name('pessoa.edit');
Route::put('/pessoa/update/{Pessoa}', 'PessoaController@update')->name('pessoa.update');
Route::delete('/pessoa/delete/{id}', 'PessoaController@destroy')->name('pessoa.destroy');

Route::get('/endereco', 'EnderecoController@index')->name('endereco.index');
Route::get('/endereco/create', 'EnderecoController@create')->name('endereco.create');
Route::get('/endereco/show/{id}', 'EnderecoController@show')->name('endereco.show');
Route::post('/endereco/store', 'EnderecoController@store')->name('endereco.store');
Route::get('/endereco/edit/{Endereco}', 'EnderecoController@edit')->name('endereco.edit');
Route::put('/endereco/update/{Endereco}', 'EnderecoController@update')->name('endereco.update');
Route::delete('/endereco/delete/{id}', 'EnderecoController@destroy')->name('endereco.destroy');

Route::get('/contato', 'ContatoController@index')->name('contato.index');
Route::get('/contato/create', 'ContatoController@create')->name('contato.create');
Route::get('/contato/show/{id}', 'ContatoController@show')->name('contato.show');
Route::post('/contato/store', 'ContatoController@store')->name('contato.store');
Route::get('/contato/edit/{Contato}', 'ContatoController@edit')->name('contato.edit');
Route::put('/contato/update/{Contato}', 'ContatoController@update')->name('contato.update');
Route::delete('/contato/delete/{id}', 'ContatoController@destroy')->name('contato.destroy');




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

