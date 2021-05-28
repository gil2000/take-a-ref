@extends('users.layouts.app')

@section('content')
    <div class="main-body">
        <!-- Breadcrumb -->
        <div class="container">
            <nav class="mx-auto" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Início</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Meu Perfil</li>
                </ol>
            </nav>
        </div>
        <!-- /Breadcrumb -->
        <div class="container">
            <div class="gutters-sd py-3">
                <div class=" mb-3 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ Auth::user()->name }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="">
                    <div class="card">
                        <div class="card-header">Categoria</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('gravarperfil')  }}" >
                                @csrf
                                <div class="mb-1">
                                    <label for="nome" class="form-label">Nome:</label>
                                    <input type="nome" class="form-control" name="text_nome" id="nome" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="mb-1">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" name="text_email" id="email" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="mb-1">
                                    <label for="telemovel" class="form-label">Telemovel:</label>
                                    <input type="telemovel" class="form-control" name="text_telemovel" id="telemovel" value="{{ Auth::user()->telemovel }}">
                                </div>
                                <div class="mb-1">
                                    <label for="nif" class="form-label">NIF:</label>
                                    <input type="nif" class="form-control" name="text_nif" id="nif" value="{{ Auth::user()->nif }}">
                                </div>
                                <div class="mb-1">
                                    <label for="" class="form-label">Estudante</label>
                                    <input type="" class="form-control" name="" id="" value="">
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Atualizar Dados</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
