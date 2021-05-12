<?php

namespace App\Http\Controllers\Admin;

use App\Ementa;
use App\Http\Controllers\Controller;
use App\Categoria;
use App\Produto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EmentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ementas = Ementa::orderBy('dia')->paginate(8);
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('admin.ementa.index')->with('ementas' , $ementas, 'produtos' , $produtos, 'categorias', $categorias);
    }

    //==========================================================================
    public function create()
    {

        $produtos = Produto::all();
        return view('admin.ementa.create')->with('produtos', $produtos);
    }

    //==========================================================================
    public function store(Request $request)
    {
        $ementa = new ementa;

        $ementa -> dia = $request->text_data;
        $ementa -> produto_id = $request->text_produto;

        $ementa->save();

        return redirect()->route('admin.ementa.index');
    }

    //==========================================================================
    public function show(Ementa $ementa)
    {
        //
    }

    //==========================================================================
    public function edit($id)
    {
        $produtos = Produto::all();
        $ementa = Ementa::find($id);
        return view('admin.ementa.edit', compact('produtos'))->with([
            'ementa' => $ementa
        ]);
    }

    //==========================================================================
    public function update(Request $request, Ementa $ementa)
    {

        $ementa -> dia = $request->text_dia;
        $ementa -> produto_id = $request->text_produto;

        $ementa->save();

        return redirect()->route('admin.ementa.index');
    }

    //==========================================================================
    public function destroy(Ementa $ementa)
    {
        $ementa->delete();
        return redirect()->route('admin.ementa.index');
    }

}
