<script>
    let tarjeta = document.getElementById('target-user');
    let datos;

    $('#btn-user-modal').on('click', function() {
        let rol = document.getElementById('user-target-rol');
        let username = document.getElementById('user-target-username');

        if(tarjeta.style.display === "none"){
            $.ajax({
                url: '{{route("datosUsuario")}}',
                type: 'POST',
                success: function(response){
                    datos = response;
                    rol.innerHTML = response[0];
                    username.innerHTML = response[1];
                }
            });
        
            tarjeta.style = "display: block;";
        }
        else tarjeta.style = "display: none;";
    });

    $('#btn-edit-userTarget').on('click', function() {
        $('#editSelfUsers').modal('show');
        document.getElementById('su_input-usuario').value = datos[1];
        document.getElementById('su_input-email').value = datos[2];
        document.getElementById('su_input-pass').disabled = 'true';
        tarjeta.style = "display: none;";
    });

    $('#btn-logout-userTarget').on('click', function() {
        window.location.href = '/logout';
    });

    function saveUpdateUser(){
        let modal_user = document.getElementById('su_input-usuario');
        let modal_email = document.getElementById('su_input-email');
        let modal_pass = document.getElementById('su_input-pass');
        let terminado = true;

        if(modal_user.value == ""){modal_user.setAttribute("class","form-control is-invalid"); terminado = false;}
        else modal_user.setAttribute("class","form-control");

        const validateEmail = (correo) => {
            return String(correo).toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
        };

        if(!validateEmail(modal_email.value)){
            modal_email.setAttribute("class","form-control is-invalid");
            terminado = false;
        }

        if(!modal_pass.disabled){
            if(modal_pass.value == ""){modal_pass.setAttribute("class","form-control is-invalid"); terminado = false;}
            else modal_pass.setAttribute("class","form-control");
        }

        if(terminado){
            let datos = {
                usuario: modal_user.value,
                email: modal_email.value,
                password: modal_pass.disabled ? null : modal_pass.value
            }

            console.log(datos);
        }
    }

    function changePass(){
        let modal_pass = document.getElementById('su_input-pass');
        if(modal_pass.disabled) modal_pass.disabled = false;
        else{
            modal_pass.disabled = true;
            modal_pass.setAttribute("class","form-control");
        }
    }
</script>