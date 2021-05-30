<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pedido;
use App\User;
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
                ->paginate(5);
        else
            $pedidos = Pedido::orderBy('updated_at', 'desc')
            ->paginate(5);

        return view('admin.pedidos.index', compact('pedidos'));

    }


    //==========================================================================
    public function create()
    {
        //
    }

    //==========================================================================
    public function store(Request $request)
    {
        //
    }

    //==========================================================================
    public function show($id)
    {
        //
    }

    //==========================================================================
    public function edit($id)
    {
        //
    }

    //==========================================================================
    public function update(Request $request, $id)
    {
        //
    }

    //==========================================================================
    public function destroy($id)
    {
        //
    }
}
