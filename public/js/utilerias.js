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