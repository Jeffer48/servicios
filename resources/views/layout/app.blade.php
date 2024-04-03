<!DOCTYPE html>
<html lang="es-mx" class="smart-style-0">
    <head>
        <title>Sistema de Registro</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{{ csrf_token() }}}">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="css/layout.css" rel="stylesheet">
        <link href="css/content.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    </head>

    <body>
        <div>
        <!-- Inicio de Sidebar -->
            @include('layout.sidebar')
        <!-- Fin de Sidebar -->
        </div>

        <div class="layout-content" style="margin-left: 18rem;">
            <!-- Inicio de NavBar -->
            <div id="header" style="position: fixed; height: 5rem; z-index: 1;">
                @include('layout.navbar')
            </div>
            <!-- Fin de NavBar -->
            <div style="padding-top: 6rem; padding-bottom: 1rem;">
                @if(session()->has('success'))
                    <script>
                        Swal.fire({
                            title: "Datos guardados correctamente!",
                            text: "Haz click para cerrar",
                            icon: "success"
                        });
                    </script>
                @endif
                @if(session()->has('error'))
                    <script>
                        Swal.fire({
                            title: "Ha ocurrido un error",
                            text: "Haz click para cerrar",
                            icon: "error"
                        });
                    </script>
                @endif
                @yield('content')
            </div>
        </div>

        @include('layout.services')
    </body>

   <script src="js/utilerias.js"></script>
</html>