<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/terminos-condiciones', 'HomeController@termino')->name('termino'); //Politicas


Route::get('/service/{name?}/{protocol?}', 'HomeController@accounts')->name('service');
Route::get('services','ServerController@serverAll')->name('service.all');

//WEBSOCKET
Route::get('/create-server/{id}', 'HomeController@premiumUsa1')->name('create-server');
ROute::post('create-server','AccountController@WS_USA1')->name('ws_free');
ROute::post('create-server/premium','AccountController@WS_Premium')->name('ws_premium');
//V2RAY
ROute::post('v2ray','v2rayController@v2rayCore')->name('v2ray');
Route::post('/v2ray/premium', 'v2rayController@v2ray_premium')->name('create-payment-v2ray')->middleware('auth');

//Route::post('/checkout/v2ary', 'paymentV2rayController@createPayment')->name('create-payment-v2ray')->middleware('auth');
//Route::get('/confirm/v2ray', 'paymentV2rayController@confirmPayment')->name('confirm-payment-v2ray')->middleware('auth');
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
Route::get('/panel/add-server','ServerController@addServer')->name('addServer');

Route::post('/panel','ServerController@saveServer')->name('saveServer');

//SSH account
Route::get('/panel/cuentas-ssh','AccountController@showSSH')->name('showSSH')->middleware('auth');
Route::get('/panel/cuentas-full','AccountController@showAllAccounts')->name('allSSH')->middleware('auth');


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

//ROUTES PARA RESTABLECER PASSWORD
Route::post('/user/password/reset','resetPasswordController@password_reset')->name('password.reset');
Route::get('/user/password/edit','resetPasswordController@password_edit')->name('password.edit');
Route::post('/user/password/update','resetPasswordController@password_update')->name('password.update');

//RUTAS PARA RECARGAR SALDO
Route::get('/recarga','SaldoController@index')->name('saldo.index')->middleware('auth');
Route::post('/checkout', 'PaymentController@createPayment')->name('create-payment')->middleware('auth');
Route::get('/confirm', 'PaymentController@confirmPayment')->name('confirm-payment')->middleware('auth');
/*TESTING VIEWMAIL*/

/*
Route::get('mail', function (){
    return view('mails.reset_password');
});
*/
/*NEW RUTAS PARA AGREGAR VISTA DE CUENTAS PREMIUM*/

Route::get('/panel/cuentas-premium','AccountController@showPremiumSSH')->name('sshPremium');
Route::get('/panel/cuentas-premium/{ip}/{user}','AccountController@renewSSH')->name('renovarSSH');
Route::post('/panel/cuentas-premium/{ip}','AccountController@updateSSH')->name('updateSSH');