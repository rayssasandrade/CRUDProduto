<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido__produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantidade');
            $table->enum('status', ['Ativo', 'Cancelado']);
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')
            ->references('id')
            ->on('produtos');
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')
            ->references('id')
            ->on('pedidos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido__produtos');
    }
}
