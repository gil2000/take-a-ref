<?php


namespace App\Http\Controllers\Admin;

use App\DetalhesPedido;
use App\Http\Controllers\Controller;

class DetalhesPedidoController extends Controller
{
    //==========================================================================
    public function __construct(){
        $this->middleware('auth');
    }

    public function verDetalhes($id){

        $detalhes = DetalhesPedido::where('pedido_id', $id)->get();
        return view('admin.pedidos.show')->with('detalhes', $detalhes);


    }

}
