<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\DetalhesPedido;
use App\Diasemana;
use App\Ementa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //==========================================================================================
    public function __construct()
    {
        $this->middleware('auth');
    }
    //==========================================================================================
    public function index()
    {
//        $start = now()->dayOfWeek > 5 ? now()->addDays(8 - now()->dayOfWeek) : now();
//        $end = now()->addDays(5 - now()->dayOfWeek);
//        $almocos = Ementa::with('produto','produto.categoria')
//            ->where('tipo', 'Almoço')
//            ->whereDate('dia', '>=', $start)
//            ->whereDate('dia', '<=', $end)
//            ->get();
//        $segundaF = Ementa::where('diasemana', 1)
//            ->orderBy('produto_id', 'ASC')
//            ->get();

        $segundaF = Ementa::where('diasemana',1)->get();
        $tercaF = Ementa::where('diasemana', 2)->get();
        $quartaF = Ementa::where('diasemana', 3)->get();
        $quintaF = Ementa::where('diasemana', 4)->get();
        $sextaF = Ementa::where('diasemana', 5)->get();

        return view('users.index', compact('segundaF','tercaF','quartaF','quintaF','sextaF'));
    }

    //==========================================================================================
    public function verPerfil(){
        return view('users.perfil');
    }

    //==========================================================================================
    public function edit(User $user){
        return view('users.edit');
    }

    //==========================================================================================
    public function update(Request $request, User $user){
        Auth::user()->update([
            'name' => $request->text_nome,
            'email' => $request->text_email,
            'telemovel' => $request->text_telemovel,
            'nif' => $request->text_nif
        ]);

        return redirect()->route('verperfil');
    }

    //==========================================================================================
    public function show($tipo , $dia){
        $ementa = Ementa::where('tipo',$tipo)->where('dia',$dia);
        return view( 'users.index',compact('ementa'));
    }

    //==========================================================================================
    public function fazerPdd(Request $request){


        $pedido = new pedido;

        $pedido->nome = $request->primeironome;
        $pedido->apelido = $request->apelido;
        $pedido->morada = $request->morada;
        $pedido->codigopostal = $request->codigopostal;
        $pedido->nif = $request->nif;

        $pedido->save();
        foreach (\Cart::content() as $product){

            $detalhespedido = new detalhespedido;

            $detalhespedido->pedido_id = $pedido->id;
            $detalhespedido->produto_id = $product->id;

            $detalhespedido->save();

            \Cart::destroy();
        }




        return redirect()->route('user.index');
    }
}
