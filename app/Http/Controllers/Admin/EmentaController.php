<?php

namespace App\Http\Controllers\Admin;

use App\Ementa;
use App\Http\Controllers\Controller;
use App\Produto;
use Illuminate\Http\Request;

class EmentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ementas = Ementa::paginate(12);
        $produtos = Produto::all();
        return view('admin.ementa.index')->with('ementas' , $ementas, 'produtos', $produtos);
    }

    //==========================================================================
    public function create()
    {
        $produtos = Produto::all();

        return view('admin.ementa.create', compact('produtos'));
    }

    //==========================================================================
    public function store(Request $request)
    {
        $ementa = new ementa;

        $ementa -> dia = $request-> text_data;
        $ementa -> produto_id = $request-> text_produto;
        $ementa -> tipo = $request-> text_horario;
        $ementa -> diasemana = $request-> text_diasemana;

        $ementa->save();

        return redirect()->route('admin.ementa.index')
            ->with('success', 'Ementa guardada com sucesso');
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

        $ementa -> dia = $request-> text_data;
        $ementa -> produto_id = $request-> text_produto;
        $ementa -> tipo = $request-> text_horario;
        $ementa -> diasemana = $request-> text_diasemana;

        $ementa->save();

        return redirect()->route('admin.ementa.index')
            ->with('success', 'Ementa editada com sucesso');
    }

    //==========================================================================
    public function destroy(Ementa $ementa)
    {
        $ementa->delete();
        return redirect()->route('admin.ementa.index')
            ->with('success', 'Ementa eliminada com sucesso');
    }

}
