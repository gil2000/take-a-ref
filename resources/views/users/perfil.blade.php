@extends('users.layouts.app')

@section('content')
    <div class="main-body">
        <!-- Breadcrumb -->
        <div class="container mb-5">
            <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb p-1">
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}"></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Perfil</li>
                </ol>
            </nav>
        </div>
        <!-- /Breadcrumb -->
        <div class="container">
            <div class="gutters-sm py-3 ">
                <div class="mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ Auth::user()->name }}</h4>
                                </div>
                                <a href="{{ route('editperfil') }}"> <button style="background: #6EAFAF" type="button" class="btn btn-sm m-1"> <i class="fas fa-pen"></i> Editar Perfil </button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
