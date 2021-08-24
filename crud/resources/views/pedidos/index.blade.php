@extends('adminlte::page')
@section('title', 'Listando Pedidos')

@section('content')
    <h1>Pedidos</h1>
    <a url="/comprar">Comprar mais</a>
    <hr>
    <div class="container">
        <div class="col-md-12 table-responsive">
            <table id="tabelaPedidos" class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pedidos as $pedido)
                        <tr>
                            <td class="white-space">{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td>{{ $pedido->produto_id }}</td>
                            <td>{{ $pedido->quantidade }}</td>
                            <td>
                                <?php
                                if ($pedido->status = 1) {
                                    echo "em aguardo";
                                } elseif ($pedido->status = 2) {
                                    echo "pago";
                                } else {
                                    echo "cancelado";
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <form action="{{ route('alterar_pedido',['id' => $pedido->id], ['status' => 2]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Pagar</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-danger" href="{{ route('alterar_pedido',['id' => $pedido->id], 3) }}">Cancelar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="alert alert-danger text-center">
                                    <i class="fa fa-exclamation-triangle"></i>
                                    Oops... nenhum registro encontrado!
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection