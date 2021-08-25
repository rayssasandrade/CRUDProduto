@extends('adminlte::page')
@section('title', 'Editando pedido')

@section('content')
    <h5>Itens:</h5>
    @foreach($produtos as $produto)
        <form action="/pedidos/delete_produto" method="post">
            @csrf
            <li class="list-group-item d-flex justify-content-between align-items-center">
            Item: {{$produto->name}} quantidade: {{$produto->quantidade}}
            <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></li>
            <input type="hidden" name="produto_id" value="{{$produto->id}}">
            <input type="hidden" name="quantidade" value="{{$produto->quantidade}}">
            <input type="hidden" name="pedido_id" value="{{$pedido->id}}">
            <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
        </form>
    @endforeach
    <ul class="list-group">
        <form action="/pedidos/update_pedido" method="post">
            @csrf
            <li class="list-group-item">Numero do Pedido: {{$pedido->id}}</li>
            <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
            <input type="hidden" name="pedido_id" value="{{$pedido->id}}">
            <input type="text" class="list-group-item col-12" value="{{$cliente->endereco}}" name="endereco">
            <input type="text" class="list-group-item col-12" value="{{$cliente->telefone}}" name="telefone">
            <li class="list-group-item">R${{$pedido->valor}}</li>
            <button class="btn btn-primary mt-2">Editar dados</button>
        </form>
    </ul>
@endsection