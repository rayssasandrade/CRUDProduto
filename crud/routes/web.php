<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    
    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Route::get('/produtos/novo', [App\Http\Controllers\ProdutosController::class, 'create']);
Route::post('/produtos/novo', [App\Http\Controllers\ProdutosController::class, 'store'])->name('registrar_produto');