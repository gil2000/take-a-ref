@extends('admin.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <div class="container mb-5">
        <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-1">
                <li class="breadcrumb-item active" aria-current="page">Cantina</li>
            </ol>
        </nav>
    </div>
    <!-- /Breadcrumb -->

    <div class="container">
        <div class="card">
            <div class="card-header">Cantina
                <a href="{{ route('admin.cantina.create') }}" type="button" class="btn btn-sm btn-outline-dark float-right">Adicionar Dados </a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><i class="fas fa-school"></i> Nome</th>
                            <th scope="col"><i class="far fa-clock"></i> Hórario</th>
                            <th scope="col"><i class="far fa-map"></i> Localização</th>
                            <th class="text-center" scope="col"><i class="fas fa-edit"></i> Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cantinas as $key => $cantina)
                            <tr>
                                <th class="align-middle" scope="row"> {{ $key + 1 }}</th>
                                <td class="align-middle">{{ $cantina->nome }}</td>
                                <td class="align-middle">{{ $cantina->horario }}</td>
                                <td class="align-middle">{{ $cantina->localizacao }}</td>
                                    <td class="">
                                        <div class="justify-content-center d-flex">
                                            <a href="{{ route('admin.cantina.edit', $cantina->id) }}"> <button type="button" class="btn btn-sm btn-primary float-left m-1 ju"><i class="fas fa-pen"></i></button> </a>
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
