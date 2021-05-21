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
Route::post('/feedback','UserFeedbackController@store')->name('feedback.store');

//Route::resource('/admin/users', 'Admin\UsersController', ['except' => ['show', 'create', 'store']]);

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:gerir-users')->group(function (){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/cantina', 'CantinaController');
    Route::resource('/produtos', 'ProdutoController');
    Route::resource('/feedback', 'FeedbackController');
    Route::resource('/categorias', 'CategoriaController');
    Route::resource('ementa', 'EmentaController')->parameters(['ementa' => 'ementa']);
});


Route::get('/perfil', 'UserController@verPerfil')->name('verperfil');
Route::get('/editarperfil', 'UserController@edit')->name('editperfil');
Route::post('/gravarperfil', 'UserController@update')->name('gravarperfil');

Route::get('/add-to-cart/{}', 'CartController@add')->name('cart.add');




