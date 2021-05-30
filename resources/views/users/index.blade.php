@extends('users.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <div class="container mb-5">
        <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-1">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>
    </div>
    <!-- /Breadcrumb -->
{{--            @if (session('status'))--}}
{{--                <div class="alert alert-success" role="alert">--}}
{{--                    {{ session('status') }}--}}
{{--                </div>--}}
{{--            @endif--}}
    <div class="container">
        <h1 class="text-center">Ementas da semana</h1>

        <div class="row my-5 justify-content-center">
            <a style="width: 200px; background: #6EAFAF" class="col-md-auto btn btn-sm btn-outline-dark align-self-center m-1" href="#segunda">Segunda-Feira</a>
            <a style="width: 200px; background: #6EAFAF" class="col-md-auto btn btn-sm btn-outline-dark align-self-center m-1" href="#terca">Terça-Feira</a>
            <a style="width: 200px; background: #6EAFAF" class="col-md-auto btn btn-sm btn-outline-dark align-self-center m-1" href="#quarta">Quarta-Feira</a>
            <a style="width: 200px; background: #6EAFAF" class="col-md-auto btn btn-sm btn-outline-dark align-self-center m-1" href="#quinta">Quinta-Feira</a>
            <a style="width: 200px; background: #6EAFAF" class="col-md-auto btn btn-sm btn-outline-dark align-self-center m-1" href="#sexta">Sexta-Feira</a>

        </div>



        <h2 id="segunda" class="text-center mb-4">Segunda-Feira</h2>
        <div class="row mb-5">
            <div class="col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-header h5 text-center">Almoço <i class="far fa-sun"></i></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($segundaF as $segunda)
                                    @if($segunda->tipo == 1)
                                        <div class="col-md-4">
                                            <p> <b>{{$segunda->nomePrato()}}</b>
                                        </div>
                                        <div class="col-md-8">
                                            {{ $segunda->produto->nome }} </p>
                                        </div>
                                    @endif
                            @endforeach
                        </div>
                        <a  data-bs-toggle="modal" data-bs-target="#segundaAlmoco" class="btn btn-sm btn-outline-dark align-self-center float-right">Comprar</a>

                        <!-- Modal -->
                        <div class="modal fade" id="segundaAlmoco" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Pratos de Segunda-Feira</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('storecarrinho') }} ">
                                             @csrf
                                            <div class="alert alert-info text-center" role="alert">
                                                Escolha os itens que vai desejar
                                            </div>
                                            @foreach($segundaF as $segunda)
                                                @if($segunda->tipo == 1)

                                                    @if($segunda->nomePrato() == 'Prato Carne: ' || $segunda->nomePrato() == 'Prato Peixe: ' || $segunda->nomePrato() == 'Prato Vegetariano: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $segunda->produto->id }}" name="pratoprincipal" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$segunda->nomePrato()}}</b> {{ $segunda->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($segunda->nomePrato() == 'Fruta: ' || $segunda->nomePrato() == 'Doce: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $segunda->produto->id }}" name="sobremesa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$segunda->nomePrato()}}</b> {{ $segunda->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($segunda->nomePrato() == 'Pão: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $segunda->produto->id }}" name="pao" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$segunda->nomePrato()}}</b> {{ $segunda->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($segunda->nomePrato() == 'Sopa: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $segunda->produto->id }}" name="sopa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$segunda->nomePrato()}}</b> {{ $segunda->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn" style="background: #6EAFAF">Continuar <i class="fas fa-shopping-cart"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-5">
                <div class="card shadow-sm">
                    <div class="card-header h5 text-center">Jantar <i class="far fa-moon"></i></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($segundaF as $segunda)
                                @if($segunda->tipo == 2)
                                    <div class="col-md-4">
                                        <p> <b>{{$segunda->nomePrato()}}</b>
                                    </div>
                                    <div class="col-md-8">
                                        {{ $segunda->produto->nome }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a  data-bs-toggle="modal" data-bs-target="#segundaJantar" class="btn btn-sm btn-outline-dark  align-self-center float-right">Comprar</a>

                        <!-- Modal -->
                        <div class="modal fade" id="segundaJantar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Pratos de Segunda-Feira</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('storecarrinho') }} ">
                                            @csrf
                                            <div class="alert alert-info text-center" role="alert">
                                                Escolha os itens que vai desejar
                                            </div>
                                            @foreach($segundaF as $segunda)
                                                @if($segunda->tipo == 2)
                                                    @if($segunda->nomePrato() == 'Prato Carne: ' || $segunda->nomePrato() == 'Prato Peixe: ' || $segunda->nomePrato() == 'Prato Vegetariano: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $segunda->produto->id }}" name="pratoprincipal" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$segunda->nomePrato()}}</b> {{ $segunda->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($segunda->nomePrato() == 'Fruta: ' || $segunda->nomePrato() == 'Doce: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $segunda->produto->id }}" name="sobremesa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$segunda->nomePrato()}}</b> {{ $segunda->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($segunda->nomePrato() == 'Pão: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $segunda->produto->id }}" name="pao" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$segunda->nomePrato()}}</b> {{ $segunda->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($segunda->nomePrato() == 'Sopa: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $segunda->produto->id }}" name="sopa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$segunda->nomePrato()}}</b> {{ $segunda->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn" style="background: #6EAFAF">Continuar <i class="fas fa-shopping-cart"></i></button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <h2 id="terca" class="text-center mb-4">Terça-Feira </h2>
        <div class="row mb-5">
            <div class="col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-header h5 text-center">Almoço <i class="far fa-sun"></i></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($tercaF as $terca)
                                @if($terca->tipo == 1)
                                    <div class="col-md-4">
                                        <p> <b>{{$terca->nomePrato()}}</b>
                                    </div>
                                    <div class="col-md-8">
                                        {{ $terca->produto->nome }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a  data-bs-toggle="modal" data-bs-target="#tercaAlmoco" class="btn btn-sm btn-outline-dark  align-self-center float-right">Comprar</a>

                        <!-- Modal -->
                        <div class="modal fade" id="tercaAlmoco" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Pratos de Terça-Feira - Almoço</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="alert alert-info text-center" role="alert">
                                                Escolha os itens que vai desejar
                                            </div>
                                            @foreach($tercaF as $terca)
                                                @if($terca->tipo == 1)
                                                    @if($terca->nomePrato() == 'Prato Carne: ' || $terca->nomePrato() == 'Prato Peixe: ' || $terca->nomePrato() == 'Prato Vegetariano: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $terca->produto->id }}" name="pratoprincipal" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$terca->nomePrato()}}</b> {{ $terca->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($terca->nomePrato() == 'Fruta: ' || $terca->nomePrato() == 'Doce: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $terca->produto->id }}" name="sobremesa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$terca->nomePrato()}}</b> {{ $terca->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($terca->nomePrato() == 'Pão: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $terca->produto->id }}" name="pao" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$segunda->nomePrato()}}</b> {{ $terca->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($terca->nomePrato() == 'Sopa: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $terca->produto->id }}" name="sopa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$terca->nomePrato()}}</b> {{ $terca->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn" style="background: #6EAFAF">Continuar <i class="fas fa-shopping-cart"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-header h5 text-center">Jantar <i class="far fa-moon"></i></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($tercaF as $terca)
                                @if($terca->tipo == 2)
                                    <div class="col-md-4">
                                        <p> <b>{{$terca->nomePrato()}}</b>
                                    </div>
                                    <div class="col-md-8">
                                        {{ $terca->produto->nome }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a  data-bs-toggle="modal" data-bs-target="#tercaJantar" class="btn btn-sm btn-outline-dark  align-self-center float-right">Comprar</a>

                        <!-- Modal -->
                        <div class="modal fade" id="tercaJantar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Pratos de Terça-Feira - Jantar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="alert alert-info text-center" role="alert">
                                                Escolha os itens que vai desejar
                                            </div>
                                            @foreach($tercaF as $terca)
                                                @if($terca->tipo == 2)
                                                    @if($terca->nomePrato() == 'Prato Carne: ' || $terca->nomePrato() == 'Prato Peixe: ' || $terca->nomePrato() == 'Prato Vegetariano: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $terca->produto->id }}" name="pratoprincipal" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$terca->nomePrato()}}</b> {{ $terca->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($terca->nomePrato() == 'Fruta: ' || $terca->nomePrato() == 'Doce: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $terca->produto->id }}" name="sobremesa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$terca->nomePrato()}}</b> {{ $terca->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($terca->nomePrato() == 'Pão: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $terca->produto->id }}" name="pao" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$segunda->nomePrato()}}</b> {{ $terca->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($terca->nomePrato() == 'Sopa: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $terca->produto->id }}" name="sopa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$terca->nomePrato()}}</b> {{ $terca->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn" style="background: #6EAFAF">Continuar <i class="fas fa-shopping-cart"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <h2 id="quarta" class="text-center mb-4">Quarta-Feira</h2>
        <div class="row mb-5">
            <div class="col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-header h5 text-center">Almoço <i class="far fa-sun"></i></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($quartaF as $quarta)
                                @if($quarta->tipo == 1)
                                    <div class="col-md-4">
                                        <p> <b>{{$quarta->nomePrato()}}</b>
                                    </div>
                                    <div class="col-md-8">
                                        {{ $quarta->produto->nome }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a  data-bs-toggle="modal" data-bs-target="#quartaAlmoco" class="btn btn-sm btn-outline-dark  align-self-center float-right">Comprar</a>

                        <!-- Modal -->
                        <div class="modal fade" id="quartaAlmoco" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Pratos de Quarta-Feira - Almoço</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="alert alert-info text-center" role="alert">
                                                Escolha os itens que vai desejar
                                            </div>
                                            @foreach($quartaF as $quarta)
                                                @if($quarta->tipo == 1)
                                                    @if($quarta->nomePrato() == 'Prato Carne: ' || $quarta->nomePrato() == 'Prato Peixe: ' || $quarta->nomePrato() == 'Prato Vegetariano: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $segunda->produto->id }}" name="pratoprincipal" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quarta->nomePrato()}}</b> {{ $quarta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($quarta->nomePrato() == 'Fruta: ' || $segunda->nomePrato() == 'Doce: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $quarta->produto->id }}" name="sobremesa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quarta->nomePrato()}}</b> {{ $quarta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($quarta->nomePrato() == 'Pão: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $quarta->produto->id }}" name="pao" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quarta->nomePrato()}}</b> {{ $quarta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($quarta->nomePrato() == 'Sopa: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $quarta->produto->id }}" name="sopa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quarta->nomePrato()}}</b> {{ $quarta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn" style="background: #6EAFAF">Continuar <i class="fas fa-shopping-cart"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-header h5 text-center">Jantar <i class="far fa-moon"></i></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($quartaF as $quarta)
                                @if($quarta->tipo == 2)
                                    <div class="col-md-4">
                                        <p> <b>{{$quarta->nomePrato()}}</b>
                                    </div>
                                    <div class="col-md-8">
                                        {{ $quarta->produto->nome }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a data-bs-toggle="modal" data-bs-target="#quartaJantar" class="btn btn-sm btn-outline-dark  align-self-center float-right">Comprar</a>

                        <!-- Modal -->
                        <div class="modal fade" id="quartaJantar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Pratos de Quarta-Feira - Jantar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="alert alert-info text-center" role="alert">
                                                Escolha os itens que vai desejar
                                            </div>
                                            @foreach($quartaF as $quarta)
                                                @if($quarta->tipo == 2)
                                                    @if($quarta->nomePrato() == 'Prato Carne: ' || $quarta->nomePrato() == 'Prato Peixe: ' || $quarta->nomePrato() == 'Prato Vegetariano: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $segunda->produto->id }}" name="pratoprincipal" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quarta->nomePrato()}}</b> {{ $quarta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($quarta->nomePrato() == 'Fruta: ' || $segunda->nomePrato() == 'Doce: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $quarta->produto->id }}" name="sobremesa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quarta->nomePrato()}}</b> {{ $quarta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($quarta->nomePrato() == 'Pão: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $quarta->produto->id }}" name="pao" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quarta->nomePrato()}}</b> {{ $quarta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($quarta->nomePrato() == 'Sopa: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $quarta->produto->id }}" name="sopa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quarta->nomePrato()}}</b> {{ $quarta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn" style="background: #6EAFAF">Continuar <i class="fas fa-shopping-cart"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <h2 id="quinta" class="text-center mb-4">Quinta-Feira</h2>
        <div class="row mb-5">
            <div class="col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-header h5 text-center">Almoço <i class="far fa-sun"></i></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($quintaF as $quinta)
                                @if($quinta->tipo == 1)
                                    <div class="col-md-4">
                                        <p> <b>{{$quinta->nomePrato()}}</b>
                                    </div>
                                    <div class="col-md-8">
                                        {{ $quinta->produto->nome }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a  data-bs-toggle="modal" data-bs-target="#quintaAlmoco" class="btn btn-sm btn-outline-dark  align-self-center float-right">Comprar</a>

                        <!-- Modal -->
                        <div class="modal fade" id="quintaAlmoco" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Pratos de Quinta-Feira - Almoço</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="alert alert-info text-center" role="alert">
                                                Escolha os itens que vai desejar
                                            </div>
                                            @foreach($quintaF as $quinta)
                                                @if($quinta->tipo == 1)
                                                    @if($quinta->nomePrato() == 'Prato Carne: ' || $quinta->nomePrato() == 'Prato Peixe: ' || $quinta->nomePrato() == 'Prato Vegetariano: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $quinta->produto->id }}" name="pratoprincipal" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quinta->nomePrato()}}</b> {{ $quinta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($quinta->nomePrato() == 'Fruta: ' || $quinta->nomePrato() == 'Doce: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $quinta->produto->id }}" name="sobremesa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quinta->nomePrato()}}</b> {{ $quinta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($quinta->nomePrato() == 'Pão: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $quinta->produto->id }}" name="pao" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quinta->nomePrato()}}</b> {{ $quinta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($quinta->nomePrato() == 'Sopa: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $quinta->produto->id }}" name="sopa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quinta->nomePrato()}}</b> {{ $quinta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn" style="background: #6EAFAF">Continuar <i class="fas fa-shopping-cart"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-header h5 text-center">Jantar <i class="far fa-moon"></i></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($quintaF as $quinta)
                                @if($quinta->tipo == 2)
                                    <div class="col-md-4">
                                        <p> <b>{{$quinta->nomePrato()}}</b>
                                    </div>
                                    <div class="col-md-8">
                                        {{ $quinta->produto->nome }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a  data-bs-toggle="modal" data-bs-target="#quintaJantar" class="btn btn-sm btn-outline-dark  align-self-center float-right">Comprar</a>
                        <!-- Modal -->
                        <div class="modal fade" id="quintaJantar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Pratos de Quinta-Feira - Jantar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="alert alert-info text-center" role="alert">
                                                Escolha os itens que vai desejar
                                            </div>
                                            @foreach($quintaF as $quinta)
                                                @if($quinta->tipo == 2)
                                                    @if($quinta->nomePrato() == 'Prato Carne: ' || $quinta->nomePrato() == 'Prato Peixe: ' || $quinta->nomePrato() == 'Prato Vegetariano: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $quinta->produto->id }}" name="pratoprincipal" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quinta->nomePrato()}}</b> {{ $quinta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($quinta->nomePrato() == 'Fruta: ' || $quinta->nomePrato() == 'Doce: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $quinta->produto->id }}" name="sobremesa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quinta->nomePrato()}}</b> {{ $quinta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($quinta->nomePrato() == 'Pão: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $quinta->produto->id }}" name="pao" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quinta->nomePrato()}}</b> {{ $quinta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($quinta->nomePrato() == 'Sopa: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $quinta->produto->id }}" name="sopa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$quinta->nomePrato()}}</b> {{ $quinta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn" style="background: #6EAFAF">Continuar <i class="fas fa-shopping-cart"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <h2 id="sexta" class="text-center mb-4">Sexta-Feira</h2>
        <div class="row mb-5">
            <div class="col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-header h5 text-center">Almoço <i class="far fa-sun"></i></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($sextaF as $sexta)
                                @if($sexta->tipo == 1)
                                    <div class="col-md-4">
                                        <p> <b>{{$sexta->nomePrato()}}</b>
                                    </div>
                                    <div class="col-md-8">
                                            {{ $sexta->produto->nome }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a  data-bs-toggle="modal" data-bs-target="#sextaAlmoco" class="btn btn-sm btn-outline-dark  align-self-center float-right">Comprar</a>
                        <!-- Modal -->
                        <div class="modal fade" id="sextaAlmoco" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Pratos de Sexta-Feira - Almoço</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="alert alert-info text-center" role="alert">
                                                Escolha os itens que vai desejar
                                            </div>
                                            @foreach($sextaF as $sexta)
                                                @if($sexta->tipo == 1)
                                                    @if($sexta->nomePrato() == 'Prato Carne: ' || $sexta->nomePrato() == 'Prato Peixe: ' || $sexta->nomePrato() == 'Prato Vegetariano: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $quinta->produto->id }}" name="pratoprincipal" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$sexta->nomePrato()}}</b> {{ $sexta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($sexta->nomePrato() == 'Fruta: ' || $sexta->nomePrato() == 'Doce: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $sexta->produto->id }}" name="sobremesa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$sexta->nomePrato()}}</b> {{ $sexta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($sexta->nomePrato() == 'Pão: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $sexta->produto->id }}" name="pao" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$sexta->nomePrato()}}</b> {{ $sexta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($sexta->nomePrato() == 'Sopa: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $sexta->produto->id }}" name="sopa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$sexta->nomePrato()}}</b> {{ $sexta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn" style="background: #6EAFAF">Continuar <i class="fas fa-shopping-cart"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-header h5 text-center">Jantar <i class="far fa-moon"></i></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($sextaF as $sexta)
                                @if($sexta->tipo == 2)
                                    <div class="col-md-4">
                                        <p> <b>{{$sexta->nomePrato()}}</b>
                                    </div>
                                    <div class="col-md-8">
                                        {{ $sexta->produto->nome }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a data-bs-toggle="modal" data-bs-target="#sextaJantar" class="btn btn-sm btn-outline-dark  align-self-center float-right">Comprar</a>
                        <!-- Modal -->
                        <div class="modal fade" id="sextaJantar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Pratos de Sexta-Feira - Jantar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="alert alert-info text-center" role="alert">
                                                Escolha os itens que vai desejar
                                            </div>
                                            @foreach($sextaF as $sexta)
                                                @if($sexta->tipo == 2)
                                                    @if($sexta->nomePrato() == 'Prato Carne: ' || $sexta->nomePrato() == 'Prato Peixe: ' || $sexta->nomePrato() == 'Prato Vegetariano: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $quinta->produto->id }}" name="pratoprincipal" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$sexta->nomePrato()}}</b> {{ $sexta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($sexta->nomePrato() == 'Fruta: ' || $sexta->nomePrato() == 'Doce: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="{{ $sexta->produto->id }}" name="sobremesa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$sexta->nomePrato()}}</b> {{ $sexta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($sexta->nomePrato() == 'Pão: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $sexta->produto->id }}" name="pao" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$sexta->nomePrato()}}</b> {{ $sexta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @elseif($sexta->nomePrato() == 'Sopa: ')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $sexta->produto->id }}" name="sopa" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                <b>{{$sexta->nomePrato()}}</b> {{ $sexta->produto->nome }}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn" style="background: #6EAFAF">Continuar <i class="fas fa-shopping-cart"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

