@extends('adminlte::page')
@section('title', 'Listando Pedidos')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
    <h1>Pedidos</h1>
    {{-- <a url="/loja">Voltar a Loja</a> --}}
    <hr>
    <div class="container">
        <div class="col-md-12 table-responsive">
            <table id="tabelaPedidos" class="table table-hover">
                <thead>
                    <tr>
                        <th>Pedido nº:</th>
                        <th>Cliente nº</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pedidos as $pedido)
                        <tr>
                            <td class="white-space">{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td>{{ $pedido->valor }}</td>
                            <td>{{ $pedido->status }}</td>
                            <td class="text-center" style="display: flex; align-items: flex-start; justify-content: center;">
                                <a class="btn btn-success"
                                    href="{{ route('alterar_pedido', ['id' => $pedido->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-primary" href="{{ route('ver_pedido', ['id' => $pedido->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{ route('excluir_pedido', ['id' => $pedido->id]) }}" method="POST" onsubmit="return confirm('Está certo da exclusão?')">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" ></script>
<script>
    $(document).ready(function() {
        $('#tabelaPedidos').DataTable();
    });
</script>
@endpush