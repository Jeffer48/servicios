<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es-mx" class="smart-style-0">
<head>
    <title>Sistema de Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
    <div>
        <form id="form-reset" class="form-control reset" href="{{route('resetPass')}}" method="GET">
            @csrf
            <div class="mb-3">
                <label class="form-label">Ingrese su correo</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com">
                <div class="invalid-feedback">Ingrese un correo valido</div>
            </div>
            <div style="text-align: end;">
                <button id="btnReset" onclick="resetPassword()" type="button" class="btn btn-success">Restaurar contraseña</button>
            </div>
        </form>
    </div>
</body>
</html>

<script>
    function resetPassword(){
        let boton = document.getElementById('btnReset');
        let email = document.getElementById('email');
        let form = document.getElementById('form-reset');

        const validateEmail = (correo) => {
            return String(correo).toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
        };

        if(!validateEmail(email.value)){
            email.setAttribute("class","form-control is-invalid");
        }else{
            email.setAttribute("class","form-control");
            form.submit();
        }
    }
</script>