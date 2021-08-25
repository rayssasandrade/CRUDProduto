@extends('adminlte::page')
@section('title', 'Criando pedido')

@section('content')
    <h1>Novo Pedido</h1>
    <div class="col-md-10">
        <form action="{{ route('registrar_pedido') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="country">Cliente:</label>
                <select id="selectClientes" name="country" class="form-control" style="width:250px">
                    <option value="">Selecione um cliente</option>
                    @foreach ($clientes as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="country">Produtos:</label>
                @foreach($produtos as $produto)
                <form action="/pedidos/store_produto_pedido" method="post">
                    @csrf
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="d-flex">Nome: {{ $produto->nome }}
                        </span>
                        <span class="d-flex">Preço: {{ $produto->preco }}  
                        </span>
                        <input type="hidden" name="produto_id" value="{{$produto->id}}" id="produto_id">
                        <input type="hidden" name="cliente_id" value="{{$key}}" id="cliente_id">
                        <span class="d-flex">
                            Quantidade: 
                            <input type="number" name="quantidade" id="quantidade"class="col col-3 ml-2" placeholder="0">
                            <button class="btn btn-primary btn-sm ml-2" type="submit">Adicionar</button>
                        </span>
                    </li> 
                </form>
                @endforeach
            </div>
        </form>
    </div>
@endsection

@push('js')
<script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('select[name="cliente"]').on('change', function() {
                var clienteID = jQuery(this).val();
                if (clienteID) {
                    jQuery.ajax({
                        url: 'dropdownlist/getclientes',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            jQuery('select[name="cliente"]').empty();
                            jQuery.each(data, function(key, value) {
                                $('select[name="cliente"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="cliente"]').empty();
                }
            });
        });
    </script>
</script>
@endpush
