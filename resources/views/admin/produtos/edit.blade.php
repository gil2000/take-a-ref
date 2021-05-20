@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Produto</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.produtos.update', $produto) }}" >
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="mb-1">
                                <label for="categoria" class="form-label">Categorias:</label>
                                    <select class="w-100 rounded" required name="text_categoria" id="">
                                        @foreach($categorias as $categoria)
                                            <option {{ $categoria->id == $produto->categoria_id ? 'selected' : '' }} value="{{ $categoria->id }}"> {{ $categoria->categoria }} </option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="mb-1">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="nome" class="form-control" name="text_nome" id="nome" value="{{ $produto->nome }}">
                            </div>
                            <div class="mb-1">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input type="text" class="form-control" name="text_descricao" id="descricao" value="{{ $produto->descricao }}">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Atualizar Dados</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection