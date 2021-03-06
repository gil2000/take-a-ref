@extends('users.layouts.app')

@section('content')

    <!-- Breadcrumb -->
    <div class="container mb-5">
        <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-1">
                <li class="breadcrumb-item"><a style="color: #1b1e21; text-decoration: none" href="{{ route('user.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a style="color: #1b1e21; text-decoration: none" href="{{ route('mostracarrinho') }}">Carrinho</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pagamento</li>
            </ol>
        </nav>
    </div>
    <!-- /Breadcrumb -->


    <div class="container" style="margin-top: 80px">
        <div class="w-100 my-5 text-center">
            <span class="border border-3 p-4">
                Total do seu pedido: <strong>{{ Cart::total() }} € </strong>.
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
                <button style="color: black; background: #6EAFAF" type="submit" class="btn btn">Efetuar Pedido</button>
            </div>
        </form>
    </div>
@endsection
