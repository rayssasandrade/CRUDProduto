<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function(){
    Route::get('/', [App\Http\Controllers\ProdutosController::class, 'index']);
    
    Auth::routes();

    Route::get('/home', [App\Http\Controllers\ProdutosController::class, 'index']);
});

Route::get('/produto/novo', [App\Http\Controllers\ProdutosController::class, 'create']);
Route::post('/produto/novo', [App\Http\Controllers\ProdutosController::class, 'store'])->name('registrar_produto');
Route::get('/produtos', [App\Http\Controllers\ProdutosController::class, 'index']);
Route::any('/produtos/search', [App\Http\Controllers\ProdutosController::class, 'search'])->name('buscar_produto');
Route::get('/produto/ver/{id}', [App\Http\Controllers\ProdutosController::class, 'show'])->name('ver_produto');
Route::get('/produto/editar/{id}', [App\Http\Controllers\ProdutosController::class, 'edit']);
Route::post('/produto/editar/{id}', [App\Http\Controllers\ProdutosController::class, 'update'])->name('alterar_produto');
Route::get('/produto/excluir/{id}', [App\Http\Controllers\ProdutosController::class, 'delete']);
Route::post('/produto/excluir/{id}', [App\Http\Controllers\ProdutosController::class, 'destroy'])->name('excluir_produto');