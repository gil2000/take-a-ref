@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Produtos
                <a href="{{ route('admin.produtos.create') }}" type="button" class="btn btn-sm btn-outline-dark float-right">Adicionar novo produto </a>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"><i class="fas fa-utensils"></i> Nome</th>
                    <th class="d-none d-md-table-cell" scope="col"><i class="fas fa-align-justify"></i> Categoria</th>
                    <th class="d-none d-md-table-cell" scope="col"><i class="far fa-file-alt"></i> Descrição</th>
                    <th class="text-center" scope="col"><i class="fas fa-edit"></i> Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $key => $produto)
                        <tr>
                            <th class="align-middle" scope="row"> {{ $key + 1 }}</th>
                            <td class="align-middle">{{ $produto->nome }}</td>
                            <td class="align-middle d-none d-md-table-cell ">{{ $produto->categoria->categoria }}</td>
                            <td class="align-middle d-none d-md-table-cell ">{{ $produto->descricao }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('admin.produtos.edit', $produto->id) }}"> <button type="button" class="btn btn-sm m-1 btn-primary float-left"> <i class="fas fa-pen"></i> </button> </a>
                                    <form action="{{ route('admin.produtos.destroy', $produto) }}" method="POST" class="float-left">
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
