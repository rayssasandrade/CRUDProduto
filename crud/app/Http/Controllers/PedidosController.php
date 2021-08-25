<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PedidoRequest;

use App\Models\Pedido;

use App\Models\Cliente;

use App\Models\Pedido_Pedido;

use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    public function index(){
        $pedidos = Pedido::paginate(20); 
        return view('pedidos.index', ['pedidos' => $pedidos]);
    }

    public function store(Request $request){
        Pedido::create([
            'nome' => $request->nome,
            'custo' => $request->custo,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
        ]);

        $request->session()
            ->flash(
                'message',
                "Pedido {$request->nome} cadastrado com sucesso"
            );
       
        return redirect ('/pedidos');
    }

    public function show($id){
        $pedido = Pedido::findOrFail($id);
        $cliente = Cliente::findOrFail($pedido->cliente_id);
        $produtos = DB::table('pedidos')
                ->join('pedido__produtos','pedidos.id','=','pedido__produtos.pedido_id')
                ->where('pedido__produtos.pedido_id','=',$pedido->id)
                ->join('produtos','pedido__produtos.produto_id','=','produtos.id')
                ->where('pedido__produtos.status','=','Ativo')
                ->select('produtos.*','pedido__produtos.quantidade')
                ->get();
        return view('pedidos.show', ['pedido' => $pedido],  ['produtos' => $produtos], ['cliente' => $cliente]);
    }

    public function edit($id){
        $pedido = Pedido::findOrFail($id);
        $produto = Produto::findOrFail($pedido->produto_id);
        $produtos = DB::table('pedidos')
        ->join('pedido__produtos','pedidos.id','=','pedido__produtos.pedido_id')
        ->where('pedido__produtos.pedido_id','=',$pedido->id)
        ->join('produtos','pedido__produtos.produto_id','=','produtos.id')
        ->where('pedido__produtos.status','=','Ativo')
        ->select('produtos.*','pedido__produtos.qtd','pedido__produtos.id as op_id')
        ->get();
        $cliente = Cliente::find($pedido->cliente_id);
        return view('pedidos.edit', ['pedido' => $pedido], ['cliente' => $cliente], ['produtos' => $produtos]);
    }

    public function update(Request $request, $id){
        $pedido = Pedido::findOrFail($id);
        $cliente = Cliente::find($pedido->cliente_id);
        $produtos = DB::table('pedidos')
                ->join('pedido__produtos','pedidos.id','=','pedido__produtos.pedido_id')
                ->where('pedido__produtos.pedido_id','=',$pedido->id)
                ->join('produtos','pedido__produtos.produto_id','=','produtos.id')
                ->where('pedido__produtos.status','=','Ativo')
                ->select('produtos.*','pedido__produtos.qtd','pedido__produtos.id as op_id')
                ->get();
        return view('pedidos.admin_update', compact('pedido','cliente','produtos'));
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
