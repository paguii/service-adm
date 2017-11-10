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
});

Auth::routes();

//Atendimento
Route::get('/home', 'AtendimentoController@index')->name('home');

Route::get('/atendimento', 'AtendimentoController@listarAreasAtendimentoIndex')->name('listarAreaAtendimento');

Route::get('/atendimento/cadastrar', 'AtendimentoController@cadastrarAreaAtendimentoIndex')->name('cadastrarAreaAtendimento');
Route::post('/atendimento/cadastrar', 'AtendimentoController@cadastrarAreaAtendimento')->name('cadastraAreaAtendimento');

Route::get('/atendimento/editar/{id}', 'AtendimentoController@editarAreaAtendimentoIndex')->name('editarAreaAtendimento');
Route::post('/atendimento/editar/{id}', 'AtendimentoController@editarAreaAtendimento')->name('editaAreaAtendimento');

Route::get('/atendimento/area/{id}/adicionar/usuario', 'AtendimentoController@incluirUsuarioAreaAtendimentoIndex')->name('incluirUsuarioAreaAtendimento');
Route::post('/atendimento/area/{id}/adicionar/usuario', 'AtendimentoController@incluirUsuarioAreaAtendimento')->name('incluiUsuarioAreaAtendimento');

//Chamados
Route::get('/atendimento/{id_fila}', 'ChamadoController@index')->name('filaAtendimento');

Route::get('/atendimento/{id_fila}/chamado/novo/', 'ChamadoController@novoChamadoIndex')->name('novoChamado');

Route::post('/atendimento/{id_fila}/chamado/novo/create', 'ChamadoController@criaNovoChamado')->name('criaNovoChamado');
Route::get('/atendimento/{id_fila}/chamado/{id_chamado}', 'ChamadoController@consultarChamadoIndex')->name('consultaChamado');

Route::get('/atendimento/{id_fila}/chamado/{id_chamado}/editar/', 'ChamadoController@editarChamadoIndex')->name('editarChamado');
Route::post('/atendimento/{id_fila}/chamado/{id_chamado}/editar/', 'ChamadoController@editarChamado')->name('editaChamado');

Route::get('/atendimento/{id_fila}/chamado/{id_chamado}/situacao/', 'ChamadoController@alterarSituacaoIndex')->name('alterarSituacao');
Route::post('/atendimento/{id_fila}/chamado/{id_chamado}/situacao/', 'ChamadoController@alterarSituacao')->name('alteraSituacao');

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

//Solicitantes
Route::get('/solicitantes', 'SolicitantesController@listarSolicitantes')->name('listarSolicitantes');

Route::get('/solicitante/novo', 'SolicitantesController@novoSolicitanteIndex')->name('novoSolicitante');
Route::post('/solicitante/novo', 'SolicitantesController@novoSolicitante')->name('cadastrarSolicitante');

Route::get('/solicitante/{id_solicitante}/editar', 'SolicitantesController@editarSolicitanteIndex')->name('editarSolicitante');
Route::post('/solicitante/{id_solicitante}/editar', 'SolicitantesController@editarSolicitante')->name('editaSolicitante');

Route::get('/solicitante/{id_solicitante}', 'SolicitantesController@consultarSolicitante')->name('consultaSolicitante');

//Relatorios
Route::get('/relatorios', 'RelatorioController@relatorioIndex')->name('listarRelatorios');

Route::get('/relatorios/tecnico', 'RelatorioController@relatorioTecnicoIndex')->name('relatorioTecnico');
Route::post('/relatorios/tecnico', 'RelatorioController@relatorioTecnico')->name('emiteRelatorioTecnico');

Route::get('/relatorios/problema/tipo', 'RelatorioController@relatorioTipoProblemaIndex')->name('relatorioTipoProblema');
Route::post('/relatorios/problema/tipo', 'RelatorioController@relatorioTipoProblema')->name('emiteRelatorioTipoProblema');

Route::get('/relatorios/problema/classe', 'RelatorioController@relatorioClasseProblema')->name('relatorioClasseProblema');
Route::post('/relatorios/problema/classe', 'RelatorioController@relatorioClasseProblema')->name('emiteRelatorioClasseProblema');

//Teste
Route::get('/teste', 'Teste@teste');