<?php

namespace App\Http\Controllers;

use App\Carrinho;
use App\Ementa;
use App\Produto;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    //========================================================================================================
    public function __construct(){
        $this->middleware('auth');
    }

    //========================================================================================================
    public function storeCarrinho(Request $request){

        $array = $request->except('_token');
        foreach ($array as $key => $value)
        {
            $product = Produto::findOrFail($value);

            \Cart::add($product->id, $product->nome, 1, $product->preco, 0, ['tipo' => $key])->associate(Produto::class);
        }

        return redirect()->route('mostracarrinho');
    }

    //========================================================================================================
    public function index(){
        return view('users.carrinho');
    }

    //========================================================================================================
    public function removeItem($rowId){
        \Cart::remove($rowId);
        return back();
    }

    //========================================================================================================
    public function apagarCarrinho(){

        \Cart::destroy();
        return redirect()->route('user.index');
    }

    //========================================================================================================
    public function pagar(){
        return view('users.pagamento');
    }

    //========================================================================================================
    public function update($rowId){

        \Cart::get($rowId);
        \Cart::update($rowId, 6);

        return redirect()->route('mostracarrinho');

    }
}
