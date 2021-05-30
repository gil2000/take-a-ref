@extends('admin.layouts.app')

@section('content')
    <div class="container mb-5">
        <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-1">
                <li class="breadcrumb-item active" aria-current="page">Ementa</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">Ementa
                <a href="{{ route('admin.ementa.create') }}" type="button" class="btn btn-sm btn-outline-dark float-right">Adicionar nova ementa </a>
            </div>
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
                        <th scope="col"><i class="fas fa-calendar-day"></i> Dia</th>
                        <th scope="col"><i class="far fa-clock"></i> Hora</th>
                        <th class="d-none d-md-table-cell" scope="col"><i class="fas fa-at"></i> Categoria</th>
                        <th scope="col"><i class="fas fa-utensils"></i> Prato</th>
                        <th class="d-none d-md-table-cell" scope="col"><i class="fas fa-calendar-alt"></i> Ultima atualização</th>
                        <th class="text-center" scope="col"><i class="fas fa-edit"></i> Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($ementas as $key => $ementa)
                            <tr>
                                <th class="align-middle" scope="row">{{ $key + 1 }}</th>
                                <td class="align-middle">{{ $ementa->dia->format('d M') }}</td>
                                <td class="align-middle">{{ $ementa->tipo}}</td>
                                <td class="align-middle d-none d-md-table-cell">{{ $ementa->produto->categoria->categoria }}</td>
                                <td class="align-middle">{{ $ementa->produto->nome }}</td>
                                <td class="align-middle d-none d-md-table-cell">{{ $ementa->updated_at->diffForHumans()}}</td>
                                <td class="">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('admin.ementa.edit', $ementa->id) }}"> <button type="button" class="btn btn-sm btn-primary m-1"><i class="fas fa-pen"></i></button> </a>
                                        <form action="{{ route('admin.ementa.destroy', $ementa) }}" method="POST">
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
                {{ $ementas->links() }}
            </div>
        </div>
    </div>
@endsection
