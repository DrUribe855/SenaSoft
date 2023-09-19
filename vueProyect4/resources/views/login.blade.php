<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }} ">

        <title>Login</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href=" {{ asset('css/app.css')}} ">
        

    </head>
    <body class="antialiased">
        <div class="container" id="app_login">
            <div class="col-md-4 offset-md-4 mt-5">
                <h1 class="my-3 text-center">Iniciar sesión</h1>
                <div class="card">
                    <div class="card-body">
                        <form id="login-form">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electronico</label>
                                <input type="email" name="email" class="form-control" id="formGroupExampleInput" placeholder="Ingrese su email">
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Contraseña</label>
                                <input type="password" name="pass" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese su contraseña">
                            </div>
                            <button type="button" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{-- scripts --}}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src=" {{ asset('js/app.js')}} "></script>
    </body>
</html>
