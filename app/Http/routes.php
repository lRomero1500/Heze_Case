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

/*Route::get('/','controlAcssController@index');

Route::get('cotizador','dashboardController@cotizador');

Route::get('error',function (){
    return view('errors/503');
});
Route::post('valida', 'controlAcssController@validaUsr');
Route::post('ingresa','controlAcssController@ingresaUsr');*/