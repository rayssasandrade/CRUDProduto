@extends('adminlte::page')
@section('title', 'Visualizar Pedido')

@section('content')
<h1>Pedido</h1>
<ul class="form-control">
    <li class="list-group-item">Número do Pedido: {{$pedido->id}}</li>
    {{-- <li class="list-group-item">Cliente: {{$cliente->nome}}</li> --}}
    @foreach($produtos as $produto)
        <li class="list-group-item">Produto: {{$produto->nome}} | Quantidade: {{$produto->quantidade}}</li>
    @endforeach
    <li class="list-group-item">R${{$pedido->valor}}</li>
</ul>
@endsection