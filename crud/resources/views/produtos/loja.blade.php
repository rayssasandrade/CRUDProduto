@extends('adminlte::page')
@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<ul class="list-group">
    <h4>Cliente: {{$cliente->nome}}</h4>
    @foreach($produtos as $produto)
    <form action="/pedidos/store_produto_pedido" method="post" class="form-control">
        @csrf
        <li class="list-group-item d-flex justify-content-between align-items-center">Nome: {{$produto->nome}} 
            <input type="hidden" name="produto_id" value="{{$produto->id}}" id="produto_id">
            <input type="hidden" name="cliente_id" value="{{$cliente->id}}" id="cliente_id">
            <input type="hidden" name="pedido_id" value="{{$pedido->id}}" id="pedido_id">
            <span class="d-flex">
                Valor: {{$produto->valor}} <input type="number" name="qtd" id="qtd"class="col col-3 ml-2" placeholder="Quant.">
                <button class="btn btn-primary btn-sm ml-2" type="submit">Adicionar</button>
            </span>
        </li>
    </form>
    @endforeach
</ul>
@if(!empty($pedido_produto->id))
<ul class="list-group">
    <li class="list-group-item">
        {{$pedido_produto->id}}
    </li>
</ul>
@endif
@endsection