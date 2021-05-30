@extends('admin.layouts.app')

@section('content')

    <!-- Breadcrumb -->
    <div class="container mb-5">
        <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-1">
                <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
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
                        <th class="d-none d-md-table-cell" scope="col"><i class="fas fa-at"></i> NIF</th>
                        <th class="text-center" scope="col"><i class="fas fa-edit"></i> Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pedidos as $key => $pedido)
                        <tr>
                            <th class="align-middle" scope="row">{{ $key + 1 }}</th>
                            <td class="align-middle">{{ $pedido->updated_at->diffForHumans() }}</td>
                            <td class="align-middle">{{ $pedido->nome}} {{ $pedido->apelido}}</td>
                            <td class="align-middle d-none d-md-table-cell">{{ $pedido->nif}}</td>
                            <td class="">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('verdetalhes', $pedido->id) }}"><button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"  class="btn btn-sm btn-success m-1"><i class="fas fa-eye"></i></button></a>
                                    <form action="" method="">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-sm btn-danger m-1"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
