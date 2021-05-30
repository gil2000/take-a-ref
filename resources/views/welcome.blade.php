    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Take-a-Ref</title>
        <link rel="shortcut icon" href="{{ asset('img/favicon.jpg') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg py-4" style="background: #B5D6D6;">
            <div class="container">
                <a class="logo"><img class="rounded" src="{{ asset('img/logo.jpg') }}" alt="logo"></a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon bg-light"></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-white h5" aria-current="page" href="{{ route('login') }}"><button style="background: #6EAFAF" type="button" class="btn mt-4">Login</button></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white h5" aria-current="page" href="{{ route('register') }}"><button style="background: #6EAFAF" type="button" class="btn mt-4">Registar</button></a>
                            </li>
                        </ul>
                </div>
            </div>
        </nav>
        <div class="container my-5 pb-5 border border-3 shadow">
            <div class="m-5">
                <p style="font-size: 42px; font-family: 'Caveat', cursive;" class="mx-5 text-dark"> Take-a-Ref</p>
                <div class="sobrenos">O projeto take-a-ref tem como propósito o
                    desenvolvimento de um software (take-a-ref) que permite a
                    comprar senhas em cantinas, assim como a marcação de
                    refeições nas mesmas.
                    É destinado principalmente para cantinas universitárias,
                    devido às complicações que às vezes surgem numa cantina
                    como as longas filas de espera ou até mesmo a superlotação
                    do espaço, mas também pode ser adotado por restaurantes ou
                    escolas.
                </div>
            </div>
            <hr class="p-1 my-5">
            <section id="feedback" class=" container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="mb-4 text-center">Feedback</h2>
                        <form method="post" action="{{ route('feedback.store') }}" >
                            @csrf
                            <div class="mb-1">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="nome" class="form-control" name="text_nome" id="nome"
                                       placeholder="">
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="text_email"
                                       id="email" placeholder="">
                            </div>
                            <div class="mb-2">
                                <label for="feedback" class="form-label">Feedback</label>
                                <textarea class="form-control" name="text_feedback" id="feedback"
                                          rows="3"></textarea>
                            </div>

                            <button style="background: #6EAFAF" type="submit" class="btn mt-4">Enviar Feedback</button>
                        </form>
                    </div>
                    <div class="col-md-6 text-center">
                        <h2 class="mb-2 text-center">Localização</h2>
                        <p>3045-601 Coimbra</p>
                        <iframe style="height: 300px" class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d931.3213817408447!2d-8.45470737076738!3d40.21175672286475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd22f9c821061499%3A0x19d99d9628f77275!2sCantina%20ESAC%2FISCAC!5e1!3m2!1spt-PT!2spt!4v1619733578949!5m2!1spt-PT!2spt" allowfullscreen="true" loading="lazy"></iframe>
                    </div>
                </div>
            </section>
        </div>
        <section class="">
            <footer class="text-center text-white" style="background: #B5D6D6;">
                <img class="rounded mt-4" src="img/logo.jpg" alt="">
                <div class="text-center p-3">
                    © 2020 Copyright: <a class="text-white" >Take-a-Ref</a>
                </div>
            </footer>
        </section>

    </body>
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</html>

