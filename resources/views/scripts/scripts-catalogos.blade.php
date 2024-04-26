<script>
    let grupos = document.getElementById("grupos");

    $(document).ready(function() {
        $('#catalogoTable').DataTable(tableLabels);
        $('#gruposTable').DataTable(tableLabels);
        $('#personalTable').DataTable(tableLabels);
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
                let datos = {id: id, nuevo: descripcion, tabla: tabla};
                ajaxSave(
                    "{{route('editar')}}",datos,"Datos actualizados correctamente!",
                    "Haz click para cerrar","success",1,"catalogos"
                );
            }
        });
    }

    function btnActivarBorrar(id,tabla,accion){
        let datos = {id: id,tabla: tabla};
        let mensaje = accion == 1 ? "¿Esta seguro de reactivar?" : "¿Esta seguro de eliminar?";
        let ruta = accion == 1 ? "{{route('activar')}}" : "{{route('eliminar')}}";
        
        confirmAlert(
            mensaje,"Esta acción es reversible","question",ruta,datos,
            "Datos actualizados correctamente!","Haz click para cerrar","success",1,tabla
        );
    }

    function guardar(tipo){
        //tipo: 1 Catalogo, 2 Grupo
        let nuevo = '';
        let alerta = '';
        let grupo = 0;
        let dir = 'catalogos';
        if(tipo == 1){
            nuevo = document.getElementById("input-nuevoCatalogo").value;
            alerta = document.getElementById("catalogoAlert");
            grupo = document.getElementById("id_grupo").value;
        }
        if(tipo == 2){
            nuevo = document.getElementById("input-nuevoGrupo").value;
            alerta = document.getElementById("grupoAlert");
            dir = 'grupos';
        }

        if(nuevo.value == ""){
            alerta.style.display = "block";
        }else{
            alerta.style.display = "none";
            let datos = {id_grupo: grupo, nuevo: nuevo};
            ajaxSave(
                "{{route('guardar')}}",datos,"Datos guardados correctamente!",
                "Haz click para continuar","success",1,dir
            );
        }
    }

    function updateFiltersCatalogo(){
        let datos = {
            id_grupo: document.getElementById("id_grupo").value,
            id_estado: document.getElementById("id_estado").value
        };

        drawDataTable("{{route('get-catalogo')}}",datos);
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
        let datos = {
            id: id,
            nombre: document.getElementById("nombre_edit").value,
            apellido_p: document.getElementById("apellido_p_edit").value,
            apellido_m: document.getElementById("apellido_m_edit").value,
            id_tipo: document.getElementById("id_puesto_edit").value,
            id_turno: document.getElementById("id_turno_edit").value,
            tabla: 'personal'
        };

        ajaxSave(
            "{{route('editar')}}",datos,"Datos guardados correctamente!",
            "Haz click para continuar","success",1,'personal'
        );
    }

    function crearPersonal(){
        let nombre = document.getElementById("np_nombre").value;
        let apellido_p = document.getElementById("np_apellido_p").value;
        let apellido_m = document.getElementById("np_apellido_m").value;
        let id_puesto = document.getElementById("np_puesto").value;
        let id_turno = document.getElementById("np_turno").value;

        if(vacios(nombre)||vacios(apellido_p)||vacios(apellido_m)||vacios(id_puesto)||vacios(id_turno)){
            message("Complete todos los campos!!","De click para cerrar","warning",0,"");
        }else{
            let datos = {
                nombre: nombre,
                apellido_p: apellido_p,
                apellido_m: apellido_m,
                id_puesto: id_puesto,
                id_turno: id_turno
            };
            ajaxMessage("{{route('nuevoPersonal')}}",datos);
            $("#nuevoPersonal").modal("hide");
            drawDataTable("{{route('get-personal')}}");
        }
    }

    function vacios(revisar){
        if(revisar=="") return true;
        else return false;
    }

    function updateFiltersPersonal(){
        let datos = {
            id_puesto: document.getElementById("id_puesto").value,
            id_turno: document.getElementById("id_turno").value,
            id_estado: document.getElementById("id_estado").value
        };

        drawDataTable("{{route('get-personal')}}",datos);
    }
</script>