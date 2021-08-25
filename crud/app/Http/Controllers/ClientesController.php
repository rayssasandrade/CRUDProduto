<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function create(){
        return view('clientes.create');
    }
    
    public function store(Request $request){
        Cliente::create([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
        ]);

        $request->session()
            ->flash(
                'message',
                "Cliente {$request->nome} cadastrado com sucesso"
            );
       
        return redirect ('/clientes');
    }

    public function index(){
        $clientes = Cliente::paginate(20); 
        return view('clientes.index', ['clientes' => $clientes]);
    }

    public function edit($id){
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    public function update(Request $request, $id){

        $cliente = Cliente::findOrFail($id);

        $cliente->update([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
        ]);

        $clientes = Cliente::paginate(20); 
        return view('clientes.index', ['clientes' => $clientes]);
    }

    public function delete($id){
        $cliente = Cliente::findOrFail($id);
        return view('clientes.delete', ['cliente' => $cliente]);
    }

    public function destroy($id){
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        $clientes = Cliente::paginate(20); 
        return view('clientes.index', ['clientes' => $clientes]);
    }
}
