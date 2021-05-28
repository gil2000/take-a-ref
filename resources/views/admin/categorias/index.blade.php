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
        <div class="card-header">Categorias
            <a href="{{ route('admin.categorias.create') }}" type="button" class="btn btn-sm btn-outline-dark float-right">Adicionar nova Categoria </a>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Categoria</th>
                    <th class="d-none d-md-table-cell" scope="col"><i class="fas fa-calendar-alt"></i> Data</th>
                    <th class="text-center" scope="col"><i class="fas fa-edit"></i> Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $key => $categoria)
                    <tr>
                        <th class="align-middle" scope="row"> {{ $key + 1 }}</th>
                        <td class="align-middle">{{ $categoria->categoria }}</td>
                        <td class="align-middle d-none d-md-table-cell">{{ $categoria->updated_at->diffForHumans()}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.categorias.edit', $categoria->id) }}"> <button type="button" class="btn btn-sm m-1 btn-primary float-left"> <i class="fas fa-pen"></i> </button> </a>
                                <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST" class="float-left">
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
@endsection
