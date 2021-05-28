@extends('users.layouts.app')

@section('content')
    <div class="main-body">
        <!-- Breadcrumb -->
        <div class="container">
            <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb p-1">
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Início</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Meu Perfil</li>
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
                                <a href=""> <button type="button" class="btn btn-sm m-1 btn-primary"> <i class="fas fa-pen"></i> Password </button> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 d-flex align-self-center">
                                    <h6 class="mb-0">Nome</h6>
                                </div>
                                <div class="col-sm-8 d-flex align-self-center text-secondary">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('editperfil') }}"> <button type="button" class="btn btn-sm m-1 btn-primary"> <i class="fas fa-pen"></i> </button> </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2 d-flex align-self-center">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-8 d-flex align-self-center text-secondary">
                                    {{ Auth::user()->email }}
                                </div>
                                <div class="col-2">
                                    <a href=""> <button type="button" class="btn btn-sm m-1 btn-primary"> <i class="fas fa-pen"></i> </button> </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2 d-flex align-self-center">
                                    <h6 class="mb-0">Nº Telemovel</h6>
                                </div>
                                <div class="col-sm-8 d-flex align-self-center text-secondary">
                                    {{ Auth::user()->telemovel }}
                                </div>
                                <div class="col-2">
                                    <a href=""> <button type="button" class="btn btn-sm m-1 btn-primary"> <i class="fas fa-pen"></i> </button> </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2 d-flex align-self-center">
                                    <h6 class="mb-0">NIF</h6>
                                </div>
                                <div class="col-sm-8 d-flex align-self-center text-secondary">
                                    {{ Auth::user()->nif }}
                                </div>
                                <div class="col-2">
                                    <a href=""> <button type="button" class="btn btn-sm m-1 btn-primary"> <i class="fas fa-pen"></i> </button> </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2 d-flex align-self-center">
                                    <h6 class="mb-0">Estudante</h6>
                                </div>
                                <div class="col-sm-8 d-flex align-self-center text-secondary">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                                </div>
                                <div class="col-2">
                                    <a href=""> <button type="button" class="btn btn-sm m-1 btn-primary "> <i class="fas fa-check-square"></i> </button> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
