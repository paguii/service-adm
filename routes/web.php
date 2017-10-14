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

//Atendimento
Route::get('/home', 'HomeController@index')->name('home');
//Chamados
Route::get('/atendimento/{id_fila}', 'AtendimentoController@index')->name('filaAtendimento');
Route::get('/atendimento/{id_fila}/chamado/novo/', 'AtendimentoController@novoChamadoIndex')->name('novoChamado');
Route::post('/atendimento/{id_fila}/chamado/novo/create', 'AtendimentoController@criaNovoChamado')->name('criaNovoChamado');
Route::get('/atendimento/{id_fila}/chamado/{id_chamado}', 'AtendimentoController@consultarChamadoIndex')->name('consultaChamado');
Route::get('/atendimento/{id_fila}/chamado/{id_chamado}/editar/', 'AtendimentoController@editarChamadoIndex')->name('editarChamado');
Route::post('/atendimento/{id_fila}/chamado/{id_chamado}/editar/', 'AtendimentoController@editarChamado')->name('editaChamado');
Route::get('/atendimento/{id_fila}/chamado/{id_chamado}/situacao/', 'AtendimentoController@alterarSituacaoIndex')->name('alterarSituacao');
Route::post('/atendimento/{id_fila}/chamado/{id_chamado}/situacao/', 'AtendimentoController@alterarSituacao')->name('alteraSituacao');


//Problemas
Route::get('/problema', 'ProblemaController@classeProblemaIndex')->name('listaClassesProblema');
Route::get('/problema/novo/', 'ProblemaController@inserirClasseProblemaIndex')->name('novaClasseProblema');
Route::post('/problema/novo/', 'ProblemaController@inserirClasseProblema')->name('inserirClasseProblema');
Route::get('/problema/{id_classe_problema}/editar', 'ProblemaController@editarClasseProblemaIndex')->name('editarClasseProblema');
Route::post('/problema/{id_classe_problema}/editar', 'ProblemaController@editarClasseProblema')->name('editaClasseProblema');
Route::get('/problema/{id_classe_problema}/tipos/novo/', 'ProblemaController@inserirTipoProblemaIndex')->name('novoTipoProblema');
Route::post('/problema/{id_classe_problema}/tipos/novo/', 'ProblemaController@inserirTipoProblema')->name('inserirTipoProblema');
Route::get('/problema/{id_classe_problema}/tipos/{id_tipo_problema}/editar', 'ProblemaController@editarTipoProblemaIndex')->name('editarTipoProblema');
Route::post('/problema/{id_classe_problema}/tipos/{id_tipo_problema}/editar', 'ProblemaController@editarTipoProblema')->name('editaTipoProblema');
Route::get('/problema/{id_classe_problema}', 'ProblemaController@consultarClasseProblemaIndex')->name('consultaClasseProblema');
Route::get('/problema/tipos/{id_classe_problema}', 'ProblemaController@getTipoProblemas')->name('getTipoProblemas');

//SLA
Route::get('/sla', 'SLAController@SLAIndex')->name('listarSLA');
Route::get('/sla/novo', 'SLAController@inserirSLAIndex')->name('novoSLA');
Route::post('/sla/novo', 'SLAController@inserirSLA')->name('inserirSLA');
Route::get('/sla/{id_sla}/editar', 'SLAController@editarSLAIndex')->name('editarSLA');
Route::post('/sla/{id_sla}/editar', 'SLAController@editarSLA')->name('editaSLA');
Route::get('/sla/{id_sla}', 'SLAController@consultarSLA')->name('consultaSLA');

//Teste
Route::get('/teste', 'Teste@teste');

