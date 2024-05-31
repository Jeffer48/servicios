<!DOCTYPE html>
<html lang="es-mx" class="smart-style-0">
    <head>
        <title>Sistema de Registro</title>
        <meta charset="utf-8">
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="css/login.css" rel="stylesheet">
    </head>
    <header>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </header>
    <body id="enterPress" style="text-align: -webkit-center; background-color: darkgray;">
        <div class="login_container">
            <div style="padding: 2rem;">
                <svg width="126" height="126" viewBox="0 0 126 126" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M63 0.5C28.5 0.5 0.5 28.5 0.5 63C0.5 97.5 28.5 125.5 63 125.5C97.5 125.5 125.5 97.5 125.5 63C125.5 28.5 97.5 0.5 63 0.5ZM63 19.25C73.375 19.25 81.75 27.625 81.75 38C81.75 48.375 73.375 56.75 63 56.75C52.625 56.75 44.25 48.375 44.25 38C44.25 27.625 52.625 19.25 63 19.25ZM63 108C47.375 108 33.5625 100 25.5 87.875C25.6875 75.4375 50.5 68.625 63 68.625C75.4375 68.625 100.312 75.4375 100.5 87.875C92.4375 100 78.625 108 63 108Z" fill="white" fill-opacity="0.42"/>
                </svg>
            </div>
            <form class="form_login">
                @csrf
                <div class="col-sm-9">
                    <input class="form-control" type="text" name="user" id="username" placeholder="Usar usuario">
                    <div class="invalid-feedback">Ingrese el usuario o el correo</div>
                </div>
                <div class="col-sm-9">
                    <input class="form-control" type="email" name="email" id="email" placeholder="Usar correo">
                    <div class="invalid-feedback">Ingrese el usuario o el correo</div>
                </div>
                <div class="col-sm-9">
                    <input class="form-control" type="password" name="password" id="password" placeholder="contraseña">
                    <div class="invalid-feedback">Ingresé su contraseña</div>
                </div>
                <button id="btnLogin" onclick="enviarDatos()" type="button" class="btn btn-success">Ingresar</button>
            </form>
            <div class="forgotPass">
                <a href="/forgot-password">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </body>
</html>

@include('scripts.scripts-login')