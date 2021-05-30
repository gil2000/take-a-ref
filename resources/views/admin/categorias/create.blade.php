@extends('admin.layouts.app')

@section('content')

    <div class="container mb-5">
        <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-1">
                <li class="breadcrumb-item"><a style="color: #1b1e21; text-decoration: none" href="{{ route('admin.categorias.index') }}">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Criar Categoria</li>
            </ol>
        </nav>
    </div>

    @if($message = Session::get('success'))
        {{ $message }}
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">Adicionar Categoria</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.categorias.store') }}" >
                            @csrf
                            <div class="mb-1">
                                <label for="categoria" class="form-label">Nome</label>
                                <input type="categoria" class="form-control" name="text_categoria" id="categoria" value="">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Adicionar Categoria</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
