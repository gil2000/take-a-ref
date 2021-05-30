<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    //=============================================================================================
    public function index(){

        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('admin.produtos.index')
            ->with('produtos', $produtos,
                   'categorias', $categorias
            );
    }


    //=============================================================================================
    public function create(){
        $categorias = Categoria::all();
        return view('admin.produtos.create')
            ->with('categorias', $categorias);
    }

    //=============================================================================================
    public function store(Request $request){
        $produto = new produto;

        $produto ->categoria_id = $request->text_categoria;
        $produto ->nome = $request->text_nome;
        $produto ->descricao = $request->text_descricao;

        $produto->save();

        return redirect()->route('admin.produtos.index')
            ->with('success', 'Produto adicionado com sucesso');
    }

    //=============================================================================================
    public function show(Produto $produto){
        //
    }

    //=============================================================================================
    public function edit(Produto $produto){

        $categorias = Categoria::all();
        $produto::find($produto);
        return view('admin.produtos.edit', compact('categorias'))
            ->with([
                'produto' => $produto,
            ]);
    }

    //=============================================================================================
    public function update(Request $request, Produto $produto){

        $produto ->categoria_id = $request->text_categoria;
        $produto ->nome = $request->text_nome;
        $produto ->descricao = $request->text_descricao;

        $produto->save();

        return redirect()->route('admin.produtos.index')
            ->with('success', 'Produto atualizado com sucesso');
    }

    //=============================================================================================
    public function destroy(Produto $produto){

        $produto->delete();
        return redirect()->route('admin.produtos.index')
            ->with('success', 'Produto eliminado com sucesso');
    }
}
