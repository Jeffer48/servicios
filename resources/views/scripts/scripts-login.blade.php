<script>
    function enviarDatos(){
        let user = document.getElementById('username').value;
        let correo = document.getElementById('email').value;

        let datos = {
            _token: "{{ csrf_token() }}",
            username: user == "" ? null : user,
            email: correo == "" ? null : correo,
            password: document.getElementById('password').value
        }

        if(validar()){
            $.ajax({
                url: "{{ route('getData') }}",
                type: 'POST',
                data: datos,
                success: function(response){
                    Swal.fire({
                        title: 'Iniciando Sesión!',
                        html: 'Cargando...',
                        allowOutsideClick: false,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        },
                    });

                    if(response == 0){
                        Swal.fire({
                            title: "Datos de sesión incorrectos",
                            text: "Haz click para cerrar",
                            icon: "error" 
                        });
                    }else{
                        window.location.href = "/";
                    }
                }
            });
        }
    }

    function validar(){
        let user = document.getElementById('username');
        let correo = document.getElementById('email');
        let pass = document.getElementById('password');
        let terminado = true;

        if(pass.value == ""){
            pass.setAttribute("class","form-control is-invalid");
            terminado = false;
        }
        else pass.setAttribute("class","form-control");

        if(user.value == "" && correo.value == ""){
            user.setAttribute("class","form-control is-invalid");
            correo.setAttribute("class","form-control is-invalid");
            terminado = false;
        }else{
            user.setAttribute("class","form-control");
            correo.setAttribute("class","form-control");
        }

        return terminado;
    }

    $('#enterPress').keypress(function (e) {
        var key = e.which;
        if(key == 13) document.getElementById('btnLogin').click();
    });   
</script>