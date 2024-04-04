$(document).ready(function() {
    let contenedor = document.getElementById("services-group");
    let alerta = document.getElementById("btn-show-modal");

    $.ajax({
        url: "/datos",
        type: 'GET',
        success: function(response){
            if(response.length > 0) alerta.style.display = "inline";
            else alerta.style.display = "none";
            $.each(response, function(i, item){
                let tarjeta = document.createElement("button");
                tarjeta.setAttribute('class','service-target');
                tarjeta.setAttribute('id','btn-service-target-'+item.id);
                tarjeta.setAttribute('onClick',"continuarEtapas("+item.id+")");

                contenedor.appendChild(tarjeta);
                let lb_maquina = document.createElement("div");
                lb_maquina.setAttribute('class','maquina-target');
                lb_maquina.textContent = item.unidad;
                let info_group = document.createElement("div");
                info_group.setAttribute('class','info-target');

                tarjeta.appendChild(lb_maquina);
                tarjeta.appendChild(info_group);
                let area = document.createElement("div");
                let incidente = document.createElement("div");
                area.textContent = "Area: "+item.area;
                incidente.textContent = "Incidente: "+item.incidente;

                info_group.appendChild(area);
                info_group.appendChild(incidente);
            });
        }
    });
});

function continuarEtapas(id){
    console.log(id);
}

$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
    },
    async: false,
    success: function(data) {},
    error: function(error, status, err) {
        if (error.status == 401)
            _gen.notificacion_min(
                'Movimiento no autorizado',
                'No cuenta con los permisos suficientes para realizar esta acción',
                4
            );
        else if (error.status == 500)
            console.log("Ha ocurrido un error");
    },
});

$("#btn-show-modal").click(function(e) {
    e.preventDefault();
    $("#services-modal").modal("show");
});

function ajaxSave(ruta,datos,title,subtitle,icon,tipo,nDir){
    $.ajax({
        url: ruta,
        type: 'POST',
        data: datos,
        success: function(response){
            if(response == 0) message("Ha ocurrido un error!","Haz click para continuar","error",0,"");
            if(response == 2) message("No se pueden eliminar grupos con catalogos activos","Haz click para continuar","error",0,"");
            if(response == 1) message(title,subtitle,icon,tipo,nDir);
            /*
                mensaje: El mensaje en el alert
                icon: succes, warning o question
                tipo: 0: Modal normal, 1: Mensaje para redireccionar, 2: Mensaje de error
                nDir: ruta para redireccionar en caso de usar el tipo 1
            */
        }
    });
}

function message($title,$subtitle,$icon,tipo,nDir){
    if(tipo == 0){
        Swal.fire({
            title: $title,
            text: $subtitle,
            icon: $icon 
        });
    }
    if(tipo == 1){
        Swal.fire({
            title: $title,
            text: $subtitle,
            icon: $icon,
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Continuar"
        }).then((result) => {
            let dir = "/"+nDir;
            window.location.href = dir;
        });
    }
}

function confirmAlert($title,$subtitle,$icon,ruta,data,title,subtitle,icon,tipo,nDir){
    Swal.fire({
        title: $title,
        text: $subtitle,
        icon: $icon,
        cancelButtonText: "Cancelar",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Continuar"
    }).then((result) => {
        if(result.isConfirmed) ajaxSave(ruta,data,title,subtitle,icon,tipo,nDir);
    });
}