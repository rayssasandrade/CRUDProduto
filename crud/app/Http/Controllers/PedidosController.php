<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidosController extends Controller
{
    //status: 1- em aberto, 2- pago, 3- cancelado
    public function search(Request $request){
        $filters = $request->all();

        $pedidos = $this->repository->search($request->filter);
        return view('pedidos.index', ['pedidos' => $pedidos, 'filtros' => $filters]);
    }

    public function store(Request $request){
        Pedido::create([
            'cliente_id' => $request->cliente_id,
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'status' => $request->status,
        ]);

        $pedidos = Pedido::paginate(20); 
        return view('pedidos.index', ['pedidos' => $pedidos]);
    }

    public function show($id){
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.show', ['pedido' => $pedido]);
    }

    public function index(){
        $pedidos = Pedido::paginate(20); 
        return view('pedidos.index', ['pedidos' => $pedidos]);
    }

    public function edit($id){
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.edit', ['pedido' => $pedido]);
    }

    public function update(Request $request, $id, $status){

        $pedido = Pedido::findOrFail($id);

        $pedido->update([
            'status' => $status,
        ]);

        $pedidos = Pedido::paginate(20); 
        return view('pedidos.index', ['pedidos' => $pedidos]);
    }

    public function delete($id){
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.delete', ['pedido' => $pedido]);
    }

    public function destroy($id){
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        $pedidos = Pedido::paginate(20); 
        return view('pedidos.index', ['pedidos' => $pedidos]);
    }
}
