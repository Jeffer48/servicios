<script>
    let fecha = document.getElementById("input-fecha");
    let jefe = document.getElementById("input-jefe");
    let operador = document.getElementById("input-operador");
    let unidad = document.getElementById("input-unidad");
    let kilometraje = document.getElementById("input-kilometraje");
    let importe = document.getElementById("input-importe");
    let litros = document.getElementById("input-litros");
    let folio = document.getElementById("input-folio");
    let observaciones = document.getElementById("input-observaciones");

    function validarDatos(){
        let correcto = true;
        correcto=cambiarClase("select",jefe,0);
        correcto=cambiarClase("select",operador,0);
        correcto=cambiarClase("select",unidad,0);

        correcto=cambiarClase("control",kilometraje,2);
        correcto=cambiarClase("control",importe,2);
        correcto=cambiarClase("control",litros,2);
        correcto=cambiarClase("control",folio,1);

        if(correcto) envioDatos();
    }

    function cambiarClase(tipo,elemento,validar){
        //0 validar ids vacios, 1 validar campos de texto, 2 validar campos númericos
        let clase = "form-control";
        if(tipo == "select") clase = "form-select";

        let correcto = true;
        switch(validar){
            case 0: if(elemento.value == 0) correcto = false; break;
            case 1: if(elemento.value == "") correcto = false; break;
            case 2: if(!validarNumInput(elemento.value)) correcto = false; break;
        }

        if(!correcto) elemento.setAttribute("class",clase+" is-invalid");
        else elemento.setAttribute("class",clase);

        return correcto;
    }

    function validarNumInput(dato){
        let correcto = true;
        if(dato <= 0) correcto = false;
        if(dato == "") correcto = false;

        return correcto;
    }

    function envioDatos(){
        let datos = {
            fecha: fecha.value,
            jefe: jefe.value,
            operador: operador.value,
            unidad: unidad.value,
            kilometraje: kilometraje.value,
            importe: importe.value,
            litros: litros.value,
            folio: folio.value,
            observaciones: observaciones.value
        };

        ajaxMessage("/cargar-combustible/guardar",datos);
    }
</script>