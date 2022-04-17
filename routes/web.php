<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('/cuentas-ssh/{country?}', 'HomeController@accounts')->name('accounts');
Route::get('/ssh-websocket/{id}', 'HomeController@premiumUsa1')->name('ssh-create');
ROute::post('ssh-websocket/{id}','AccountController@WS_USA1')->name('ws_prem_usa1');

//Routes panel ///GENERAL

Route::get('/panel','PanelController@index')->name('panel');

Route::get('/panel/lista-server','ServerController@show')->name('server.show');
Route::get('/panel/lista-server/{id}','ServerController@edit')->name('server.edit');
Route::put('/panel/lista-server/{id}','ServerController@update')->name('server.update');
Route::delete('/panel/lista-server/{id}','ServerController@destroy')->name('server.destroy');
//Sales routas
Route::get('/panel/ventas','SalesController@show')->name('sales.show');

//Add server
Route::get('/panel/add-server','PanelController@addServer')->name('addServer');

Route::post('/panel','PanelController@saveServer')->name('saveServer');

//SSH account
Route::get('/panel/cuentas-ssh','AccountController@showSSH')->name('showSSH');

// route for processing payment
Route::view('/checkout', 'home');
Route::post('/checkout', 'PaymentController@createPayment')->name('create-payment');
Route::get('/confirm', 'PaymentController@confirmPayment')->name('confirm-payment');