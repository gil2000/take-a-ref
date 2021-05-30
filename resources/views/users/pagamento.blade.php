@extends('users.layouts.app')

@section('content')

        <!-- Breadcrumb -->
        <div class="container">
            <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb p-1">
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Início</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Meu Perfil</li>
                </ol>
            </nav>
        </div>


    <div class="container" style="margin-top: 80px">
        <div class="w-100 my-5 text-center">
            <span class="border border-3 p-4">
                Total do seu pedido: {{ Cart::total() }} €.
                Para pagar basta enviar por MBWAY o valor da encomenta para 914578956.
            </span>
        </div>

        <form method="POST" action="{{ route('fazerpdd') }}" class="row g-3 bg-light" style="margin-top: 100px">
            @csrf
            <div class="h6 my-4">Informação para faturação</div>
            <div class="col-md-6">
                <label for="inputNome" class="form-label">Primeiro Nome</label>
                <input name="primeironome" type="name" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputApelido" class="form-label">Apelido</label>
                <input name="apelido" type="name" class="form-control" id="inputApelido">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Morada</label>
                <input name="morada" type="text" class="form-control" id="inputAddress">
            </div>
            <div class="col-md-4">
                <label for="inputZip" class="form-label">Código Postal</label>
                <input name="codigopostal" type="text" class="form-control" id="inputZip">
            </div>
            <div class="col-md-8">
                <label for="inputCity" class="form-label">Numero de Identificação Fiscal</label>
                <input name="nif" type="text" class="form-control" id="inputCity">
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Aceito as <a href="">políticas de privacidade</a>
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Efetuar Pedido</button>
            </div>
        </form>
    </div>
@endsection
