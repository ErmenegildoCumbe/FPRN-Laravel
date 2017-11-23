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

Route::get('/', function () {
    return view('home');
});

Route::resource('provincia', 'ProvinciaController');
Route::resource('areaactuacao', 'AreaactuacaoController');
Route::resource('combatente', 'CombatenteController');
Route::resource('emprestimo', 'EmprestimoController');
Route::resource('linhacredito', 'LinhacreditoController');
Route::resource('pagamento', 'PagamentoController');
Route::resource('pedidoemprestimo', 'PedidoemprestimoController');
Route::resource('projecto', 'ProjectoController');
Route::resource('user', 'UserController');
Route::get('logar', function () {
    return view('login');
});
Route::get('admin', function () {
    return view('admin.index');
});
Route::get('recebidos', 'PedidoemprestimoController@paraaprovacao');

Route::get('/combatentesComplete', 'CombatenteController@autocomplete')->name('combatenteauto');
Route::get('/pedidosComplete', 'PedidoemprestimoController@autocomplete')->name('pedidoauto');

Route::get('/combatentes', 'CombatenteController@viajson');	
Route::get('/pedidoemprestimos/{id}', 'PedidoemprestimoController@createattr');
//Route::post('/pedidoemprestimos/{id}', 'PedidoemprestimoController@createattr');
Route::post('/pedido', 'PedidoemprestimoController@ola');
Route::post('/pedido', 'PedidoemprestimoController@gravar');
Route::get('/detalhes', 'PedidoemprestimoController@detalhes')->name('detail');
Route::get('/pesquisa', 'PedidoemprestimoController@viajson')->name('getmach');
Route::get('/pedido/{id}', 'PedidoemprestimoController@paraimprimir')->name('impressao');
Route::get('pedidoempresti', 'PedidoemprestimoController@getall')->name('pedidoempresti');
Route::get('/test','PedidoemprestimoController@dom');
//Route::get('/avaliar','PedidoemprestimoController@avaliar');
Route::get('/pedidoanalise/{id}','PedidoemprestimoController@avaliar2')->name('pedidoanalise');

Route::get('/indexado', 'CombatenteController@indexado')->name('indexado');
Route::get('/reporter','PedidoemprestimoController@estatisticas');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
