<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    
    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
});

//CLIENTE
Route::get('/cliente/novo', [App\Http\Controllers\ClientesController::class, 'create']);
Route::post('/cliente/novo', [App\Http\Controllers\ClientesController::class, 'store'])->name('registrar_cliente');
Route::get('/clientes', [App\Http\Controllers\ClientesController::class, 'index']);
Route::get('/cliente/editar/{id}', [App\Http\Controllers\ClientesController::class, 'edit']);
Route::post('/cliente/editar/{id}', [App\Http\Controllers\ClientesController::class, 'update'])->name('alterar_cliente');
Route::get('/cliente/excluir/{id}', [App\Http\Controllers\ClientesController::class, 'delete']);
Route::post('/cliente/excluir/{id}', [App\Http\Controllers\ClientesController::class, 'destroy'])->name('excluir_cliente');

//PRODUTO
Route::get('/produto/novo', [App\Http\Controllers\ProdutosController::class, 'create']);
Route::post('/produto/novo', [App\Http\Controllers\ProdutosController::class, 'store'])->name('registrar_produto');
Route::get('/produtos', [App\Http\Controllers\ProdutosController::class, 'index']);
Route::get('/produto/ver/{id}', [App\Http\Controllers\ProdutosController::class, 'show'])->name('ver_produto');
Route::get('/produto/editar/{id}', [App\Http\Controllers\ProdutosController::class, 'edit']);
Route::post('/produto/editar/{id}', [App\Http\Controllers\ProdutosController::class, 'update'])->name('alterar_produto');
Route::get('/produto/excluir/{id}', [App\Http\Controllers\ProdutosController::class, 'delete']);
Route::post('/produto/excluir/{id}', [App\Http\Controllers\ProdutosController::class, 'destroy'])->name('excluir_produto');

//PEDIDO

Route::get('/pedido/novo', [App\Http\Controllers\PedidosController::class, 'create']);
Route::post('/pedido/novo', [App\Http\Controllers\PedidosController::class, 'store'])->name('registrar_pedido');
Route::get('/pedidos', [App\Http\Controllers\PedidosController::class, 'index']);
Route::any('/pedidos/search', [App\Http\Controllers\PedidosController::class, 'search'])->name('buscar_pedido');
Route::get('/pedido/ver/{id}', [App\Http\Controllers\PedidosController::class, 'show'])->name('ver_pedido');
Route::get('/pedido/editar/{id}', [App\Http\Controllers\PedidosController::class, 'edit']);
Route::post('/pedido/editar/{id}', [App\Http\Controllers\PedidosController::class, 'update'])->name('alterar_pedido');
Route::get('/pedido/excluir/{id}', [App\Http\Controllers\PedidosController::class, 'delete']);
Route::post('/pedido/excluir/{id}', [App\Http\Controllers\PedidosController::class, 'destroy'])->name('excluir_pedido');
Route::post('/pedidos/store_produto_pedido', [App\Http\Controllers\PedidosController::class, 'store_produto_pedido']);

//CLIENTES
Route::get('dropdownlist','DataController@getClientes');