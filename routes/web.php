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

Route::get('/', function(){
    return view('iService');
    //return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//Atendimento
Route::get('/atendimento/{id}', 'AtendimentoController@index')->name('filaAtendimento');

//Chamados
Route::get('/atendimento/{id}', 'AtendimentoController@index')->name('filaAtendimento');
Route::get('/atendimento/{id}/chamado/novo/', 'AtendimentoController@novoChamadoIndex')->name('novoChamado');
Route::post('/atendimento/{id}/chamado/novo/create', 'AtendimentoController@criaNovoChamado')->name('criaNovoChamado');

//Ajax
Route::get('/problema/{id}', 'AtendimentoController@getTipoProblemas')->name('getTipoProblemas');

//Teste
Route::get('/teste', 'Teste@teste');

