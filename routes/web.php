<?php

use Illuminate\Support\Facades\Route;

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
    return view('teste');
});
Route::post('/enviar_feedback', 'FeedbackController@store')->name('enviarfeedback');

Route::get('/zasdadsa', 'CondutosController@index')->name('login');
Route::get('/adsa', 'CondutosController@index')->name('register');


