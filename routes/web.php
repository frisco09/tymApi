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
    return view('welcome');
});

Auth::routes();
//user
Route::get('/home', 'HomeController@index')->name('home');
Route::get('profile', 'UserController@profile')->name('perfil');
Route::post('profile', 'UserController@update_avatar');

//chat-rutes
Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');
//playes-user-rutes
Route::get('player/games','PlayerController@getGamesPlayer')->name('player-games');/*<--listado de partidos*/

//partidos
Route::get('player/games/{id}','PartidoController@confirmar_partido')->name('confirmar-partido');
Route::get('player/new/game/{id}','PartidoController@new_game')->name('new-game');
Route::get('player/partido/{id_user_1}/{id_user_2}/{modo_juego}/{creditos}','PartidoController@armarPartido')->name('armar-partido');
//Resultados
Route::get('/result/list','ResultadoController@index_result')->name('result-list');
Route::post('result-validation', 'ResultadoController@formValidationResult')->name('result-validation');
Route::get('/result/load/{id}','ResultadoController@certification_blade')->name('certificar-result');

//creditos-pricing
Route::get('/creditos/pricing','CreditosController@creditos_blade')->name('creditos-blade');
Route::get('/creditos/payment/{id}','CreditosController@payment_blade')->name('payment-blade');
Route::post('/pago', 'CreditosController@pago');