<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    
    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Route::get('/produtos/novo', [App\Http\Controllers\ProdutosController::class, 'create']);
Route::post('/produtos/novo', [App\Http\Controllers\ProdutosController::class, 'store'])->name('registrar_produto');
Route::get('/produto/ver/{id}', [App\Http\Controllers\ProdutosController::class, 'show']);
Route::get('/produto/editar/{id}', [App\Http\Controllers\ProdutosController::class, 'edit']);
Route::post('/produto/editar/{id}', [App\Http\Controllers\ProdutosController::class, 'update'])->name('alterar_produto');
Route::get('/produto/excluir/{id}', [App\Http\Controllers\ProdutosController::class, 'delete']);
Route::post('/produto/excluir/{id}', [App\Http\Controllers\ProdutosController::class, 'destroy'])->name('excluir_produto');