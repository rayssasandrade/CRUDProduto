@extends('adminlte::page')
@section('title', 'Editando produto')

@section('content')
    <h1>Editar</h1>
    <div class="col-md-5">
        <form action="{{ route('alterar_produto',['id' => $produto->id])}}" method="POST">
            @csrf
            <label for="">Nome</label> <br />
            <input type="text" name="nome" class="form-control" value="{{ $produto->nome }}"> <br />
            <label for="">Custo</label> <br />
            <input type="text" name="custo" class="form-control" value="{{ $produto->custo }}"> <br />
            <label for="">Preço</label> <br />
            <input type="text" name="preco" class="form-control" value="{{ $produto->preco }}"> <br />
            <label for="">Quantidade</label> <br />
            <input type="text" name="quantidade" class="form-control" value="{{ $produto->quantidade }}"> <br />
            <button class="btn btn-danger" class="form-control">Salvar</button>
        </form>
    </div>
@endsection