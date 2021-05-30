@extends('admin.layouts.app')

@section('content')

    <div class="container mb-5">
        <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-1">
                <li class="breadcrumb-item"><a style="color: #1b1e21; text-decoration: none" href="{{ route('admin.produtos.index') }}">Produtos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Adicionar Produto</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Adicionar Produto</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.produtos.store') }}" >
                            @csrf
                            <div class="mb-1">
                                <label for="categoria" class="form-label">Categorias:</label>
                                <select class="w-100 rounded" required name="text_categoria" id="">
                                    <option disabled selected value> Selecione uma opção </option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}"> {{ $categoria->categoria }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-1">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="nome" class="form-control" name="text_nome" id="nome" value="">
                            </div>

                            <div class="mb-1">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input type="text" class="form-control" name="text_descricao" id="descricao" value="">
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Adicionar Produto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
