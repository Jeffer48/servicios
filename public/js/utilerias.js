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