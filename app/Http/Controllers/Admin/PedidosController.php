<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pedido;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    //==========================================================================
    public function __construct(){
        $this->middleware('auth');
    }

    //==========================================================================
    public function index(Request $request){

        if(!is_null($request->search))
            $pedidos = Pedido::orderBy('updated_at', 'desc')
                ->where('nome', 'like', '%' . $request->search . '%')
                ->paginate(10);
        else
            $pedidos = Pedido::orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('admin.pedidos.index', compact('pedidos'));

    }

    //==========================================================================
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('admin.pedidos.index')
            ->with('success', 'Ementa eliminada com sucesso');
    }
}
