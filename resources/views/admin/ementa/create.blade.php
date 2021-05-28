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
                    <div class="card-header">Adicionar Produto</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.ementa.store') }}" >
                            @csrf

                            <div class="mb-1">
                                <label for="data" class="form-label">Data</label>
                                <input type="date" class="form-control" name="text_data" id="data" required value="" >
                            </div>

                            <div class="mb-1">
                                <label for="diasemana" class="form-label">Dia da Semana:</label>
                                <select class="w-100 rounded" required name="text_diasemana" id="diasemana">
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
                                <select class="w-100 rounded" required name="text_horario" id="horario">
                                    <option disabled selected value> Selecione uma opção </option>
                                    <option value="1"> Almoço </option>
                                    <option value="2"> Jantar </option>
                                </select>
                            </div>

                            <div class="mb-1">
                                <label for="produto" class="form-label">Produtos:</label>
                                <select class="w-100 rounded" required name="text_produto" id="">
                                    <option disabled selected value> Selecione uma opção </option>
                                    @foreach($produtos as $produto)
                                        <option value="{{ $produto->id }}"> {{ $produto-> nome }} </option>
                                    @endforeach
                                </select>
                            </div>



                            <button type="submit" class="btn btn-primary mt-2">Adicionar Ementa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
