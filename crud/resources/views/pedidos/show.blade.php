@extends('adminlte::page')
@section('title', 'Detalhes do produto')

@section('content')
    <h1>Detalhes</h1>
    <div class="col-md-5">
        <label for="">Nome</label> <br />
        <input type="text" name="nome" class="form-control" value="{{ $produto->nome }}"> <br />
        <label for="">Custo</label> <br />
        <input type="text" name="custo" class="form-control" value="{{ $produto->custo }}"> <br />
        <label for="">Preço</label> <br />
        <input type="text" name="preco" class="form-control" value="{{ $produto->preco }}"> <br />
        <label for="">Quantidade</label> <br />
        <input type="text" name="quantidade" class="form-control" value="{{ $produto->quantidade }}"> <br />
    </div>
@endsection