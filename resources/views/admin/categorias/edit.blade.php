@extends('admin.layouts.app')

@section('content')
    <div class="container mb-5">
        <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-1">
                <li class="breadcrumb-item"><a style="color: #1b1e21; text-decoration: none" href="{{ route('admin.categorias.index') }}">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Categorias</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Editar Categoria</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.categorias.update', $categoria) }}" >
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="mb-1">
                                <label for="categoria" class="form-label">Nome</label>
                                <input type="categoria" class="form-control" name="text_categoria" id="categoria" value="{{ $categoria->categoria }}">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Atualizar Dados</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
