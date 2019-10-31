<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::prefix('evento')->group(function() {
    Route::get('/','EventoController@index');
    Route::get('/create','EventoController@create');
    Route::post('/','EventoController@store');
    Route::get('{id}/edit', 'EventoController@edit');
    
    Route::get('/presenca/{evento_id}','EventoController@listaPresenca');
    
    Route::put('/{evento_id}','EventoController@update'); //Salvar alteracao
    Route::delete('/{evento_id}', 'EventoController@destroy');//Deletar pedido
});

Route::prefix('participante')->group(function() {
    Route::get('/','ParticipanteController@index');
    Route::get('create','ParticipanteController@create');
    Route::post('store','ParticipanteController@store');
    Route::get('edit/{participante}','ParticipanteController@edit');
    Route::post('update/{participante}', 'ParticipanteController@update');
    Route::get('delete/{participante}', 'ParticipanteController@destroy');
    Route::get('show/{participante}', 'ParticipanteController@show');
    Route::get('cracha/{participante}/{evento}','CrachaController@index');
});