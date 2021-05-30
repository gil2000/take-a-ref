@extends('admin.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <div class="container mb-5">
        <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-1">
                <li class="breadcrumb-item"><a style="color: #1b1e21; text-decoration: none" href="{{ route('admin.pedidos.index') }}">Pedidos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhe Pedido</li>
            </ol>
        </nav>
    </div>
    <!-- /Breadcrumb -->

    <div class="container">
        <div class="card">
            <div class="card-header">Pedidos</div>
            <div class="card-body">
                <form class="m-2 border border-dark" action="" method="GET">
                    <div class="input-group input-group-navbar">
                        <input type="text" name='search' class="form-control" placeholder="Procurar…" aria-label="Search">
                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><i class="fas fa-calendar-day"></i> Hora de Pedido</th>
                        <th scope="col"><i class="far fa-clock"></i> Nome</th>
                        <th class="d-none d-md-table-cell" scope="col"><i class="fas fa-at"></i>Pratos</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detalhes as $key => $detalhe)
                        <tr>
                            <th class="align-middle" scope="row">{{ $key + 1 }}</th>
                            <td class="align-middle">{{ $detalhe->updated_at->diffForHumans() }}</td>
                            <td class="align-middle">{{ $detalhe->pedido->nome }}</td>
                            <td class="align-middle d-none d-md-table-cell">{{ $detalhe->produto->nome}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
