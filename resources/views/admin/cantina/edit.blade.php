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

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dados Cantina</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('admin.cantina.update', $cantina) }}" >
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="mb-1">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="nome" class="form-control" name="text_nome" id="nome" value="{{ $cantina->nome }}">
                            </div>

                            <div class="mb-1">
                                <label for="horario" class="form-label">Horário</label>
                                <input type="text" class="form-control" name="text_horario" id="horario" value="{{ $cantina->horario }}">
                            </div>

                            <div class="mb-1">
                                <label for="localizacao" class="form-label">Localização</label>
                                <input type="text" class="form-control" name="text_localizacao" id="localizacao" value="{{ $cantina->localizacao }}">
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Atualizar Dados</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
