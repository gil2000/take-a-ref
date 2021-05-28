@extends('admin.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="card">
        <div class="card-header">Cantina</div>

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
@endsection
