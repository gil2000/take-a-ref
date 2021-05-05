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
    return view('welcome');
})->name('welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@index')->name('user.index');


//Route::resource('/admin/users', 'Admin\UsersController', ['except' => ['show', 'create', 'store']]);

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:gerir-users')->group(function (){
    Route::post('/search', 'UsersController@search')->name('users.search');
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/cantina', 'CantinaController');
    Route::resource('/produtos', 'ProdutoController');
    Route::resource('/feedback', 'FeedbackController');
    Route::resource('/categorias', 'CategoriaController');
});







