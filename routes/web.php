<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/terminos-condiciones', 'HomeController@termino')->name('termino'); //Politicas


Route::get('/service/{name?}/{protocol?}', 'HomeController@accounts')->name('service');
Route::get('services','ServerController@serverAll')->name('service.all');

//WEBSOCKET
Route::get('/ssh-websocket/{id}', 'HomeController@premiumUsa1')->name('ssh-create');
ROute::post('ssh-websocket/{id}','AccountController@WS_USA1')->name('ws_prem_usa1');
//V2RAY
ROute::post('v2ray/{id}','v2rayController@v2rayCore')->name('v2ray');
//Routes panel ///GENERAL

Route::get('/panel','PanelController@index')->name('panel');
//Routas de moduls server
Route::get('/panel/lista-server','ServerController@show')->name('server.show')->middleware('auth');
Route::get('/panel/lista-server/{id}','ServerController@edit')->name('server.edit')->middleware('auth');
Route::put('/panel/lista-server/{id}','ServerController@update')->name('server.update')->middleware('auth');
Route::delete('/panel/lista-server/{id}','ServerController@destroy')->name('server.destroy')->middleware('auth');
//Sales routas
Route::get('/panel/ventas','SalesController@show')->name('sales.show')->middleware('auth');

//Add server
Route::get('/panel/add-server','PanelController@addServer')->name('addServer');

Route::post('/panel','PanelController@saveServer')->name('saveServer');

//SSH account
Route::get('/panel/cuentas-ssh','AccountController@showSSH')->name('showSSH')->middleware('auth');

// route for processing payment
Route::view('/checkout', 'home')->middleware('auth');
Route::post('/checkout', 'PaymentController@createPayment')->name('create-payment')->middleware('auth');
Route::get('/confirm', 'PaymentController@confirmPayment')->name('confirm-payment')->middleware('auth');

//Rutas de usuario

Route::get('/panel/usuarios','UsersController@index')->name('user.index')->middleware('auth');

Route::get('/panel/usuarios/ver/{user?}','UsersController@show')->name('user.show')->middleware('auth');

Route::get('/panel/usuarios/{user}','UsersController@edit')->name('user.edit')->middleware('auth');
Route::put('/panel/usuarios/{user}','UsersController@update')->name('user.update')->middleware('auth');
Route::delete('/panel/usuarios/{user}','UsersController@destroy')->name('user.destroy')->middleware('auth');
//ROUTE SERVICE
Route::get('/panel/services','ServiceController@index')->name('service.index')->middleware('auth');
Route::get('/panel/service','ServiceController@create')->name('service.create')->middleware('auth');
Route::post('/panel/service','ServiceController@store')->name('service.store')->middleware('auth');
Route::get('/panel/service/{service}','ServiceController@edit')->name('service.edit')->middleware('auth');
Route::put('/panel/service/{service}','ServiceController@update')->name('service.update')->middleware('auth');
Route::delete('/panel/service/{service}','ServiceController@destroy')->name('service.destroy')->middleware('auth');