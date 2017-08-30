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
Route::get('/atendimento/{id}', 'AtendimentoController@index');

Route::get('/teste', 'Teste@teste');

