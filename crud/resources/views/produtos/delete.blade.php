@extends('adminlte::page')
@section('title', 'Detalhes do produto')

@section('content')
    <h1>Detalhes</h1>
    <div class="col-md-5">
        <form action="{{ route('excluir_produto',['id' => $produto->id])}}" method="POST">
            {{method_field('post')}}
            @csrf
            <label for="">Tem certeza que deseja excluir este produto?</label> <br />
            <input type="text" class="form-control" name="nome" value="{{ $produto->nome }}"> <br/>
            <button class="btn btn-primary">Sim</button>
        </form>
    </div>
@endsection
