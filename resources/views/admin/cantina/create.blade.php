@extends('admin.layouts.app')

@section('content')
    <div class="container mb-5">
        <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-1">
                <li class="breadcrumb-item"><a style="color: #1b1e21; text-decoration: none" href="{{ route('admin.cantina.index') }}">Cantina</a></li>
                <li class="breadcrumb-item active" aria-current="page">Novos Dados Cantina</li>
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
                    <div class="card-header">Adicionar Dados</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.cantina.store') }}" >
                            @csrf
                            <div class="mb-1">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="nome" class="form-control" name="text_nome" id="nome" value="">
                            </div>
                            <div class="mb-1">
                                <label for="horario" class="form-label">Horario</label>
                                <input type="text" class="form-control" name="text_horario" id="horario" value="">
                            </div>
                            <div class="mb-1">
                                <label for="localizacao" class="form-label">Localização</label>
                                <input type="text" class="form-control" name="text_localizacao" id="localizacao" value="">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Adicionar Categoria</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
