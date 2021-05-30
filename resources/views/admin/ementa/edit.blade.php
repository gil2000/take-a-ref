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

    @if($message = Session::get('success'))
        {{ $message }}
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Editar Ementa</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.ementa.update', $ementa) }}" >
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="mb-1">
                                <label for="data" class="form-label">Data</label>
                                <input type="date" class="form-control" name="text_data" id="data" required value="{{ $ementa->updated_at }}" >
                            </div>
                            <div class="mb-1">
                                <label for="diasemana" class="form-label">Dia da Semana:</label>
                                <select class="w-100 rounded" required name="text_diasemana" id="diasemana" value="{{ $ementa->diasemana }}">
                                    <option disabled selected value> Selecione uma opção </option>
                                    <option value="1"> Segunda </option>
                                    <option value="2"> Terça </option>
                                    <option value="3"> Quarta </option>
                                    <option value="4"> Quinta </option>
                                    <option value="5"> Sexta </option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="tipo" class="form-label">Horario:</label>
                                <select class="w-100 rounded" required name="text_horario" id="horario" value="">
                                    <option disabled selected value> Selecione uma opção </option>
                                    <option value="1"> Almoço </option>
                                    <option value="2"> Jantar </option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="produto" class="form-label">Produtos:</label>
                                <select class="w-100 rounded" required name="text_produto" id="" value="{{ $ementa->produto }}>
                                    <option disabled selected value> Selecione uma opção </option>
                                    @foreach($produtos as $produto)
                                        <option value="{{ $produto->id }}"> {{ $produto-> nome }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Editar Ementa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
