@extends('adminlte::page')
@section('title', 'Editando cliente')

@section('content')
    <h1>Editar</h1>
    <div class="col-md-5">
        <form action="{{ route('alterar_cliente',['id' => $cliente->id])}}" method="POST">
            @csrf
            <label for="">Nome</label> <br />
            <input type="text" name="nome" class="form-control" value="{{ $cliente->nome }}"> <br />
            <label for="">Endereço</label> <br />
            <input type="text" name="endereco" class="form-control" value="{{ $cliente->endereco }}"> <br />
            <label for="">Telefone</label> <br />
            <input type="text" name="telefone" class="form-control" value="{{ $cliente->telefone }}"> <br />
            <button class="btn btn-danger" class="form-control">Salvar</button>
        </form>
    </div>
@endsection
