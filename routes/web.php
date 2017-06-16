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

Route::get('/', 'DashboardController@index');
Route::resource('automatos', 'AutomatoController');
Route::get('/funcoes', 'DashboardController@funcoes')->name('funcoes');
Route::get('/operacoes', 'DashboardController@operacoes')->name('operacoes');

// Funções
Route::post('/resultado/funcao', 'ResultadoController@resultadoFuncao')->name('resultado_funcao');

// Operações
Route::post('/resultado/operacao', 'ResultadoController@resultadoOperacao')->name('resultado_operacao');
