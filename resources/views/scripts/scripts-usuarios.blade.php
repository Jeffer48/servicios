<script>
    let nombre = document.getElementById("input-nombre");
    let apellido_p = document.getElementById("input-apellido-p");
    let apellido_m = document.getElementById("input-apellido-m");
    let email = document.getElementById("input-email");
    let withEmail = document.getElementById("usarCorreo");
    let usuario = document.getElementById("input-usuario");

    function updateFilters(){
        let datos = {
            id_tipo: document.getElementById("id_rol").value,
            id_estado: document.getElementById("id_estado").value
        }
        
        drawDataTable("{{route('get-usuarios')}}",datos);
    }

    function limpiarModal(){
        nombre.value = "";
        nombre.disabled = false;
        apellido_p.value = "";
        apellido_p.disabled = false;
        apellido_m.value = "";
        apellido_m.disabled = false;
        email.value = "";
        email.disabled = false;
        withEmail.checked = true;
        usuario.value = "";
        document.getElementById("input-pass").value = "";
        document.getElementById("nu_id_tipo").value = 0;
        document.getElementById("input-personal").value = 0;
    }

    function useExistentUser(){
        let user = document.getElementById("input-personal");
        
        if(user.value == "0"){
            nombre.disabled = false;
            apellido_p.disabled = false;
            apellido_m.disabled = false;
        }else{
            nombre.disabled = true;
            apellido_p.disabled = true;
            apellido_m.disabled = true;
        }
    }

    function useEmail(){
        if(withEmail.checked) email.disabled = false;
        else email.disabled = true;
    }

    function newUser(){
        let completo = true;
        let user = document.getElementById("input-personal");
        let password = document.getElementById("input-pass");
        let rol = document.getElementById("nu_id_tipo");
        let u_nombre = "";
        let u_apellido_p = "";
        let u_apellido_m = "";

        const validateEmail = (correo) => {
            return String(correo).toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
        };

        if(password.value == ""){password.setAttribute("class","form-control is-invalid");completo = false;}
        else password.setAttribute("class","form-control");
        if(rol.value == "0"){rol.setAttribute("class","form-select is-invalid");completo = false;}
        else rol.setAttribute("class","form-select");
        if(usuario.value == ""){usuario.setAttribute("class","form-control is-invalid");completo = false;}
        else usuario.setAttribute("class","form-control");
        if(withEmail.checked){
            if(!validateEmail(email.value)){
                email.setAttribute("class","form-control is-invalid");
                completo = false;
            }
        }
        else email.setAttribute("class","form-control");

        if(user.value == "0"){
            if(nombre.value == ""){nombre.setAttribute("class","form-control is-invalid"); completo = false;}
            else nombre.setAttribute("class","form-control");
            if(apellido_p.value == ""){apellido_p.setAttribute("class","form-control is-invalid"); completo = false;}
            else apellido_p.setAttribute("class","form-control");
            if(apellido_m.value == ""){apellido_m.setAttribute("class","form-control is-invalid"); completo = false;}
            else apellido_m.setAttribute("class","form-control");
        }else{
            nombre.setAttribute("class","form-control");
            apellido_p.setAttribute("class","form-control");
            apellido_m.setAttribute("class","form-control");
        }

        let datos = {};
        if(completo){
            let correo = withEmail.checked ? email.value : "";
            if(user.value == "0"){
                datos = {
                    nombre: nombre.value,
                    apellido_p: apellido_p.value,
                    apellido_m: apellido_m.value,
                    usuario: usuario.value,
                    email: correo,
                    password: password.value,
                    id_rol: rol.value
                };
            }else{
                datos = {
                    id_personal: user.value,
                    usuario: usuario.value,
                    email: correo,
                    password: password.value,
                    id_rol: rol.value
                };
            }
        }

        confirmAlert("¿Esta seguro de crear el usuario?","Haga click para cerrar","question","{{route('save-user')}}",datos);
    }
</script>