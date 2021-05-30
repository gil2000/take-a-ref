@extends('admin.layouts.app')

@section('content')

    <div class="container mb-5 mx-auto">
        <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-1">
                <li class="breadcrumb-item"><a style="color: #1b1e21; text-decoration: none" href="{{ route('admin.ementa.index') }}">Ementa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Ementa</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Editar Ementa</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.ementa.update', $ementa->id) }}" >
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="mb-1">
                                <label for="dia" class="form-label">Nome</label>
                                <input type="date" class="form-control" name="text_dia" id="nome" placeholder="{{ $ementa->dia }}" value="{{ $ementa->dia }}">
                            </div>

                            <div class="mb-1">
                                <label for="categoria" class="form-label">Produtos:</label>
                                <select class="w-100 rounded" required name="text_produto" id="">
                                    @foreach($produtos as $produto)
                                        <option value="{{ $produto->id }}"> {{ $produto->nome }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Atualizar Dados</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
