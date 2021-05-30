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
    public function index(){

        $pedidos = Pedido::all();
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
