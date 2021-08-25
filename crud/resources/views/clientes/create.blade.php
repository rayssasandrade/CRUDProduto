@extends('adminlte::page')
@section('title', 'Cadastrando cliente')

@section('content')
    <h1>Novo</h1>
    <div class="col-md-5">
        <form action="{{ route('registrar_cliente')}}" method="POST">
            @csrf
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" class="form-control">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" class="form-control">
            <button class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
