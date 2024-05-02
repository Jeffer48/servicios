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

    function useExistentUser(id_select,id_nombre,id_apellido_p,id_apellido_m){
        let user = document.getElementById(id_select);
        
        if(user.value == "0"){
            document.getElementById(id_nombre).disabled = false;
            document.getElementById(id_apellido_p).disabled = false;
            document.getElementById(id_apellido_m).disabled = false;
        }else{
            document.getElementById(id_nombre).disabled = true;
            document.getElementById(id_apellido_p).disabled = true;
            document.getElementById(id_apellido_m).disabled = true;
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

    function changeEstate(id){
        let datos = {id: id};

        confirmAlert("¿Esta seguro de desactivar el usuario?","Esta acción es reversible","question","{{route('changeEstate')}}",datos);
    }

    let id_to_edit = 0;
    function updateUser(id){
        let personal = document.getElementById("eu_input-personal");
        let nombre = document.getElementById("eu_input-nombre");
        let apellido_p = document.getElementById("eu_input-apellido-p");
        let apellido_m = document.getElementById("eu_input-apellido-m");
        let email = document.getElementById("eu_input-email");
        let usuario = document.getElementById("eu_input-usuario");
        let rol = document.getElementById("eu_id_tipo");
        usuario.value = "";
        nombre.value = "";
        apellido_p.value = "";
        apellido_m.value = "";
        email.value = "";
        id_to_edit = id;

        $.ajax({
            url: "{{route('userToUpdate')}}",
            type: 'POST',
            data: {id: id},
            success: function(response){
                if(response[0] != null){
                    personal.value = response[0];
                    nombre.disabled = true;
                    apellido_p.disabled = true;
                    apellido_m.disabled = true;
                }
                else{
                    personal.value = 0;
                    nombre.value = response[3];
                    apellido_p.value = response[4];
                    apellido_m.value = response[5];
                }

                usuario.value = response[2];
                email.value = response[6];
                rol.value = response[1];
            }
        });
    }

    function saveUpdate(){
        let personal = document.getElementById("eu_input-personal");
        let nombre = document.getElementById("eu_input-nombre");
        let apellido_p = document.getElementById("eu_input-apellido-p");
        let apellido_m = document.getElementById("eu_input-apellido-m");
        let email = document.getElementById("eu_input-email");
        let usuario = document.getElementById("eu_input-usuario");
        let rol = document.getElementById("eu_id_tipo");

        let datos = {
            id: id_to_edit,
            id_personal: personal.value,
            id_tipo: rol.value,
            nombre: nombre.value,
            apellido_p: apellido_p.value,
            apellido_m: apellido_m.value,
            username: usuario.value,
            email: email.value
        };

        confirmAlert(
            "¿Esta seguro de actualizar el usuario?",
            "Haga click para continuar","question",
            "{{route('updateUser')}}",datos
        );
        $("#editarPersonal").modal("hide");
    }
</script>