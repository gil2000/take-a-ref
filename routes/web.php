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

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/user', 'UserController@index')
    ->name('user.index');

Route::post('/feedback','UserFeedbackController@store')
    ->name('feedback.store');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:gerir-users')->group(function (){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/cantina', 'CantinaController', ['except' => ['show']]);
    Route::resource('/produtos', 'ProdutoController');
    Route::resource('/feedback', 'FeedbackController', ['except' => ['create', 'store', 'show', 'edit', 'update']]);
    Route::resource('/categorias', 'CategoriaController', ['except' => ['show']]);
    Route::resource('ementa', 'EmentaController')->parameters(['ementa' => 'ementa']);
    Route::resource('/pedidos', 'PedidosController', ['except' => ['create', 'store', 'show', 'edit', 'update']]);

});
Route::get('/detalhes/{id}', 'Admin\DetalhesPedidoController@verDetalhes')->name('verdetalhes')->middleware('can:gerir-users');


Route::get('/ementa/{tipo}/{dia}', 'UserController@show')->name('show');

Route::get('/perfil', 'UserController@verPerfil')->name('verperfil');
Route::get('/editarperfil', 'UserController@edit')->name('editperfil');
Route::post('/gravarperfil', 'UserController@update')->name('gravarperfil');

Route::post('/guardar-carrinho', 'CartController@storeCarrinho')->name('storecarrinho');
Route::get('/carrinho', 'CartController@index')->name('mostracarrinho');
Route::post('/carrinho-atualizar', 'CartController@update')->name('atualizarcarrinho');
Route::post('/carrinho/remover-item/{id}', 'CartController@removeItem')->name('removeritem');
Route::get('/apagar-carrinho', 'CartController@apagarCarrinho')->name('apagarcarrinho');


Route::get('/pagar', 'CartController@pagar')->name('pagar');
Route::post('/confirmar-pdd' , 'UserController@fazerPdd')->name('fazerpdd');




