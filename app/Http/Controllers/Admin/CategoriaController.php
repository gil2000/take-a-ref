<?php

namespace App\Http\Controllers\Admin;

use App\Cantina;
use App\Http\Controllers\Controller;
use App\Categoria;
use App\Produto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index')->with('categorias', $categorias);
    }

    //==========================================================================
    public function create()
    {
        return view('admin.categorias.create');
    }

    //==========================================================================
    public function store(Request $request)
    {
        $categoria = new categoria;

        $categoria -> categoria = $request->text_categoria;


        $categoria->save();

        return redirect()->route('admin.categorias.index');
    }

    //==========================================================================
    public function show(Categoria $categoria)
    {
        //
    }

    //==========================================================================
    public function edit(Categoria $categoria)
    {
        $categorias = Categoria::find($categoria);

        return view('admin.categorias.edit', compact('categorias'))->with([
            'categoria' => $categoria,
        ]);
    }

    //==========================================================================
    public function update(Request $request, Categoria $categoria)
    {
        $categoria ->categoria = $request->text_categoria;

        $categoria->save();

        return redirect()->route('admin.categorias.index');
    }

    //==========================================================================
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('admin.categorias.index');
    }
}
