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

function ajaxMessage(ruta,datos){
    $.ajax({
        url: ruta,
        type: 'POST',
        data: datos,
        success: function(response){
            message(response[0],response[1],response[2],response[3],response[4]);
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
            if(nDir != ""){
                let dir = "/"+nDir;
                window.location.href = dir;
            }else location.reload();
        });
    }
}

function confirmAlert($title,$subtitle,$icon,ruta,data){
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
        if(result.isConfirmed) ajaxMessage(ruta,data);
    });
}