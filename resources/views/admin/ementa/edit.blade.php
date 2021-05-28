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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Produto</div>

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
