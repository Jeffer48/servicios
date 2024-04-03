<script>
    let grupos = document.getElementById("grupos");
    let opt = "opt-"+{{$opt}};

    $(document).ready(function() {
        $('#catalogoTable').DataTable({
            "language":{
                "lengthMenu": "_MENU_ Filas por página",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "search": "Buscar",
                "infoEmpty": "Sin datos",
                "emptyTable": "Este grupo no tiene nada asignado aún"
            }
        });

        $('#gruposTable').DataTable({
            "language":{
                "lengthMenu": "_MENU_ Filas por página",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "search": "Buscar",
                "infoEmpty": "Sin datos",
                "emptyTable": "Este grupo no tiene nada asignado aún"
            }
        });

        $('#personalTable').DataTable({
            "language":{
                "lengthMenu": "_MENU_ Filas por página",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "search": "Buscar",
                "infoEmpty": "Sin datos",
                "emptyTable": "Este grupo no tiene nada asignado aún"
            }
        });
    });

    function btnEditar(id,tabla){
        Swal.fire({
            title: "Ingresa la nueva descripción",
            input: "text",
            inputAttributes: {
                autocapitalize: "off"
            },
            cancelButtonText: "Cancelar",
            showCancelButton: true,
            confirmButtonText: "Guardar",
            showLoaderOnConfirm: true,
            preConfirm: async (descripcion) => {
                $.ajax({
                    url: "{{route('editar')}}",
                    type: 'POST',
                    data: {id: id, nuevo: descripcion, tabla: tabla},
                    success: function(response){
                        successMsg(response);
                    }
                });
            }
        });
    }

    function btnBorrar(id,tabla){
        Swal.fire({
            title: "¿Esta seguro de eliminar?",
            text: "Esta acción es reversible",
            icon: "question",
            cancelButtonText: "Cancelar",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Continuar"
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    url: "{{route('eliminar')}}",
                    type: 'POST',
                    data: {id: id, tabla: tabla},
                    success: function(response){
                        if(response == 2){
                            Swal.fire({
                                title: "No se pueden eliminar grupos con catalogos activos",
                                text: "Haz click para cerrar",
                                icon: "error"
                            });
                        }
                        else successMsg(response,"Datos actualizados correctamente!",tabla);
                    }
                });
            }
        });
    }

    function btnActivar(id,tabla){
        Swal.fire({
            title: "¿Esta seguro de reactivar?",
            text: "Esta acción es reversible",
            icon: "question",
            cancelButtonText: "Cancelar",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Continuar"
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    url: "{{route('activar')}}",
                    type: 'POST',
                    data: {id: id,tabla: tabla},
                    success: function(response){
                        successMsg(response,"Datos actualizados correctamente!",tabla);
                    }
                });
            }
        });
    }

    function successMsg(response,$respuesta,nDir){
        if(response == 1){
            Swal.fire({
                title: $respuesta,
                text: "Haz click para cerrar",
                icon: "success",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Continuar"
            }).then((result) => {
                let dir = "/"+nDir;
                console.log(dir);
                window.location.href = dir;
            });
        }
        else{
            Swal.fire({
                title: "Ha ocurrido un error",
                text: "Haz click para cerrar",
                icon: "error"
            });
        }
    }

    function guardarCatalogo(){
        let nuevo = document.getElementById("input-nuevoCatalogo").value;
        let alerta = document.getElementById("catalogoAlert");
        let grupo = document.getElementById("id_grupo").value;

        if(nuevo.value == ""){
            alerta.style.display = "block";
        }else{
            alerta.style.display = "none";
            $.ajax({
                url: "{{route('guardar')}}",
                type: 'POST',
                data: {id_grupo: grupo, nuevo: nuevo},
                success: function(response){
                    successMsg(response,"Datos guardados correctamente!");
                }
            });
        }
    }

    function guardarGrupo(){
        let nuevo = document.getElementById("input-nuevoGrupo").value;
        let alerta = document.getElementById("grupoAlert");

        if(nuevo.value == ""){
            alerta.style.display = "block";
        }else{
            alerta.style.display = "none";
            $.ajax({
                url: "{{route('guardar')}}",
                type: 'POST',
                data: {id_grupo: 0, nuevo: nuevo},
                success: function(response){
                    successMsg(response,"Datos guardados correctamente!",'grupos');
                }
            });
        }
    }

    //---------------------------------------- PERSONAL -----------------------------------------------
    let personal_id = 0;
    function btnEditPersonal(id,nombre,apellido_m,apellido_p,id_tipo,id_turno){
        let nombreInput = document.getElementById("nombre_edit");
        let apellido_pInput = document.getElementById("apellido_p_edit");
        let apellido_mInput = document.getElementById("apellido_m_edit");
        let puestoInput = document.getElementById("puesto-"+id_tipo);
        let turnoInput = document.getElementById("turno-"+id_turno);
        let btnGuardar =  document.getElementById("btn-editarP");
        personal_id = id;

        nombreInput.value = nombre;
        apellido_pInput.value = apellido_p;
        apellido_mInput.value = apellido_m;
        puestoInput.selected = true;
        turnoInput.selected = true;
        btnGuardar.setAttribute('onclick','editarPersonal('+id+')');
    }

    function editarPersonal(id){
        let nombre = document.getElementById("nombre_edit").value;
        let apellido_p = document.getElementById("apellido_p_edit").value;
        let apellido_m = document.getElementById("apellido_m_edit").value;
        let puesto_id = document.getElementById("id_puesto_edit").value;
        let turno_id = document.getElementById("id_turno_edit").value;

        $.ajax({
            url: "{{route('editar')}}",
            type: 'POST',
            data: {
                id: id,
                nombre: nombre,
                apellido_p: apellido_p,
                apellido_m: apellido_m,
                id_tipo: puesto_id,
                id_turno: turno_id,
                tabla: 'personal'
            },
            success: function(response){
                successMsg(response,"Datos actualizados correctamente!",'personal');
            }
        });
    }
</script>