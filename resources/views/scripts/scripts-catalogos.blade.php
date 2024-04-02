<script>
    let grupos = document.getElementById("grupos");
    let opt = "opt-"+{{$opt}};

    $(document).ready(function() {
        let optSel = document.getElementById(opt);
        optSel.selected = "true";

        $('#catalogo').DataTable({
            "language":{
                "lengthMenu": "_MENU_ Filas por página",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "search": "Buscar"
            }
        });
    });

    function btnEditar(id){
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
                    data: {id: id, nuevo: descripcion},
                    success: function(response){
                        successMsg(response);
                    }
                });
            }
        });
    }

    function btnBorrar(id){
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
            $.ajax({
                url: "{{route('eliminar')}}",
                type: 'POST',
                data: {id: id},
                success: function(response){
                    successMsg(response);
                }
            });
        });
    }

    function btnActivar(id){
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
            $.ajax({
                url: "{{route('activar')}}",
                type: 'POST',
                data: {id: id},
                success: function(response){
                    successMsg(response);
                }
            });
        });
    }

    function successMsg(response){
        if(response == 1){
            Swal.fire({
                title: "Datos actualizados correctamente!",
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
</script>