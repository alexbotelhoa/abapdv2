<?php

use Illuminate\Support\Facades\Route;
use App\Carrinho;

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
    return redirect()->route('carrinho.index');
});

Route::resource('/carrinho', 'ControladorCarrinho');
Route::get('/carrinho/{carrinho}/destroy', 'ControladorCarrinho@destroy')->name('carrinho.destroy');

Route::resource('/categorias', 'ControladorCategoria');

Route::resource('/produtos', 'ControladorProduto');

Route::resource('/vendas', 'ControladorVenda');

Route::get('limparCarrinho', function () {
    if (session('carrinho') != "") Carrinho::limparCarrinho();
    return redirect()->route('carrinho.index');
})->name('limparCarrinho');