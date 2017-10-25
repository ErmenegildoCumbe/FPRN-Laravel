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


Route::get('/combatentes', 'CombatenteController@viajson');	
Route::get('/pedidoemprestimos/{id}', 'PedidoemprestimoController@createattr');
//Route::post('/pedidoemprestimos/{id}', 'PedidoemprestimoController@createattr');
Route::post('/pedido', 'PedidoemprestimoController@ola');
Route::post('/pedido', 'PedidoemprestimoController@gravar');
Route::get('/pedido/{id}', 'PedidoemprestimoController@paraimprimir')->name('impressao');


