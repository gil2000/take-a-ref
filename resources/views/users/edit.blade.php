@extends('users.layouts.app')

@section('content')
    <div class="main-body">

        <!-- Breadcrumb -->
        <div class="container mb-5">
            <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb p-1">
                    <li class="breadcrumb-item"><a style="color: #1b1e21; text-decoration: none" href="{{ route('user.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a style="color: #1b1e21; text-decoration: none" href="{{ route('verperfil') }}">Perfil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Perfil</li>
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
                        <div class="card-header">Editar Perfil</div>

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
                                <button style="background: #6EAFAF" type="submit" class="btn mt-2"><i class="fas fa-user-check"></i> Atualizar Dados</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
