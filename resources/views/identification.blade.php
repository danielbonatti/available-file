<!DOCTYPE html>
<html lang="pt-br" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Scripts -->
        <script src="{{ asset('public/js/app.js') }}" defer></script>
        <!-- Styles -->
        <link rel="icon" href="{{ asset('public/images/favicon-16x16.ico') }}" type="image/x-icon">
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    
        <style></style>

        <title>Files - HSIST</title>
    </head>
    <body class="pb-2">
        
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <img src="{{ asset('public/images/logo.png') }}" height="36" alt="HSist">
            <nav class="my-2 my-md-0 mr-md-3"></nav>
        </div>

        <section class="vh-80">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <form class="form" method="post" action="{{route('download.file')}}">
                                    <!--importar csrf, proteção do laravel, para requisição do formulário-->
                                    @csrf 
                                    <img class="img-responsive mb-4" src="{{ asset('public/images/logo.png') }}" height="70" alt="Hsist">
                                    <h5 class="mb-3 font-weight-normal">Baixe seu(s) arquivo(s)</h5>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    {{ $error }}<br>
                                                @endforeach
                                        </div>
                                    @endif 
                                    
                                    @if (session('danger'))
                                        <div class="alert alert-warning">
                                            {{ session('danger') }}
                                        </div>
                                    @endif

                                    @if (session('sucess'))
                                        <div class="alert alert-sucess">
                                            {{ session('sucess') }}
                                        </div>
                                    @endif
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-at"></i></span>
                                            </div>
                                            <input type="email" class="form-control" placeholder="E-mail" aria-label="Usuário" aria-describedby="basic-addon1" name="email" autofocus>
                                        </div>
                                    </div>

                                    <button class="btn btn-lg btn-success btn-block" type="submit">Download</button>
                                    <p class="mt-5 mb-3 text-muted" style="font-size:10px;">HSIST INFORMÁTICA HOSPITALAR<br>TODOS OS DIREITOS RESERVADOS</p>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script></script>
    </body>
</html>