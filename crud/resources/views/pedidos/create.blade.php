@extends('adminlte::page')
@section('title', 'Criando pedido')

@section('content')
    <h1>Novo Pedido</h1>
    <div class="col-md-5">
        <form action="{{ route('registrar_pedido')}}" method="POST">
            @csrf
            {{Form::select('cliente_id',
               $clientes,
               $cliente->cliente_id,
               ['id'=>'myselect','class' =>'form-control'])}}
            <label for="">Nome</label> <br />
            <input type="text" name="nome" class="form-control"> <br />
            <label for="">Custo</label> <br />
            <input type="text" name="custo" class="form-control"> <br />
            <label for="">Preço</label> <br />
            <input type="text" name="preco" class="form-control"> <br />
            <label for="">Quantidade</label> <br />
            <input type="text" name="quantidade" class="form-control"> <br />
            <button class="btn btn-danger" class="form-control">Salvar</button>
        </form>
    </div>
@endsection