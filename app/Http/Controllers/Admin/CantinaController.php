<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Cantina;
use Illuminate\Http\Request;

class CantinaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //==========================================================================================
    public function index()
    {
        $cantinas = Cantina::all();
        return view('admin.cantina.index')->with('cantinas', $cantinas);
    }

    //==========================================================================================
    public function create()
    {
        return view('admin.cantina.create');
    }

    //==========================================================================================
    public function store(Request $request)
    {
        $cantina = new cantina;

        $cantina->nome = $request->text_nome;
        $cantina->horario = $request->text_horario;
        $cantina->localizacao = $request->text_localizacao;

        $cantina->save();

        return redirect('admin\users');
    }

    //==========================================================================================
    public function show(Cantina $cantina)
    {
        //
    }

    //==========================================================================================
    public function edit(Cantina $cantina)
    {
        $cantina::all()->first();
        return view('admin.cantina.edit')->with([
            'cantina' => $cantina,
        ]);
    }

    //==========================================================================================
    public function update(Request $request, Cantina $cantina)
    {
        $cantina ->nome = $request->text_nome;
        $cantina ->horario = $request->text_horario;
        $cantina ->localizacao = $request->text_localizacao;

        $cantina->save();

        return redirect()->route('admin.cantina.index');
    }

    //==========================================================================================
    public function destroy(Cantina $cantina)
    {
        //
    }
}
