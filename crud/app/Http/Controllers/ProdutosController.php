<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutosController extends Controller
{
    public function create(){
        return view('produtos.create');
    }

    public function search(Request $request){
        $filters = $request->all();

        $produtos = $this->repository->search($request->filter);
        return view('produtos.index', ['produtos' => $produtos, 'filtros' => $filters]);
    }

    public function store(Request $request){
        Produto::create([
            'nome' => $request->nome,
            'custo' => $request->custo,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
        ]);

        $produtos = Produto::paginate(20); 
        return view('produtos.index', ['produtos' => $produtos]);
    }

    public function show($id){
        $produto = Produto::findOrFail($id);
        return view('produtos.show', ['produto' => $produto]);
    }

    public function index(){
        $produtos = Produto::paginate(20); 
        return view('produtos.index', ['produtos' => $produtos]);
    }

    public function edit($id){
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', ['produto' => $produto]);
    }

    public function update(Request $request, $id){

        $produto = Produto::findOrFail($id);

        $produto->update([
            'nome' => $request->nome,
            'custo' => $request->custo,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
        ]);

        $produtos = Produto::paginate(20); 
        return view('produtos.index', ['produtos' => $produtos]);
    }

    public function delete($id){
        $produto = Produto::findOrFail($id);
        return view('produtos.delete', ['produto' => $produto]);
    }

    public function destroy($id){
        $produto = Produto::findOrFail($id);
        $produto->delete();

        $produtos = Produto::paginate(20); 
        return view('produtos.index', ['produtos' => $produtos]);
    }
}
