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
                        else successMsg(response,"Datos actualizados correctamente!");
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
                        successMsg(response,"Datos actualizados correctamente!");
                    }
                });
            }
        });
    }

    function successMsg(response,$respuesta){
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
                window.location.href = "/catalogos";
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
                    successMsg(response,"Datos guardados correctamente!");
                }
            });
        }
    }
</script>