<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('acceso/login','controlAcssController@index');
Route::get('/','dashboardController@home')->middleware('auth');
Route::get('dashboard/home','dashboardController@home')->middleware('auth');
Route::get('dashboard/crm/clientes','dashboardController@clientes')->middleware('auth');
Route::get('dashboard/crm/empresas','dashboardController@empresas')->middleware('auth');
Route::get('dashboard/crm/colaboradores','dashboardController@colaboradores')->middleware('auth');
Route::post('valida', 'controlAcssController@validaUsr');
Route::post('ingresa','controlAcssController@ingresaUsr');
Route::get('front/cotizador','frontController@index')->middleware('auth');
Route::get('error','ErrorController@index');

/*--------------------------Inicio-Mantenimiento--------------------------*/
/*Route::get('dashboard/mant/clientes','companiasController@index')->middleware('auth');*/
Route::get('dashboard/mant/empresas','companiasController@index')->middleware('auth');
Route::get('dashboard/mant/colaboradores','colaboradoresController@index')->middleware('auth');
Route::get('getEmpresa/{id}','companiasController@show');
Route::post('CreaEditEmpresa','companiasController@store');
Route::post('deleteEmpresa/{id}','companiasController@destroy');
/*Route::get('dashboard/mant/colaboradores','companiasController@index')->middleware('auth');*/
/*----------------------------Fin-Mantenimiento----------------------------*/