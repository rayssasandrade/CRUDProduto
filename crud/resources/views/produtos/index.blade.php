@extends('adminlte::page')
@section('title', 'Listando todos os registros')

@section('content')
    <h1>Produtos</h1>
    <a href="{{ route('registrar_produto') }}">Novo</a>
    <hr>
    {{-- <form method="POST" action="{{ route('buscar_produto') }}" class="form form-inline">
        @csrf
        <input type="text" name="filter" placeholder="Filtrar: " class="form-control">
        <button type="submit" class="btn btn-info">Buscar</button>
    </form> --}}
    <div class="container">
        <div class="col-md-12 table-responsive">
            <table id="tabelaProdutos" class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Custo</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produtos as $produto)
                        <tr>
                            <td class="white-space">{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->custo }}</td>
                            <td>{{ $produto->preco }}</td>
                            <td>{{ $produto->quantidade }}</td>
                            <td class="text-center">
                                <a class="btn btn-success" href="{{ route('alterar_produto',['id' => $produto->id]) }}">Editar
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-primary" href="{{ route('ver_produto', ['id' => $produto->id]) }}">Ver
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('excluir_produto',['id' => $produto->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="alert alert-danger text-center">
                                    <i class="fa fa-exclamation-triangle"></i>
                                    Oops... nenhum registro encontrado!
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection