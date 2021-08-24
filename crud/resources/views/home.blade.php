@extends('adminlte::page')
@section('title', 'Listando todos os registros')

@section('content')
    <h1>Produtos</h1>
    <div class="container">
        <div class="col-md-12 table-responsive">
            <form>
                <div class="form-group">
                    <label for="Nome">Nome</label>
                    <input type="nome" class="form-control" id="Nome" value="{{ $produto->nome }}">
                </div>
                
            </form>
        </div>
    </div>
@endsection