<script>
    var now = 0;
    $(document).ready(function() {
        now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        document.getElementById('input-fecha').value = now.toISOString().slice(0,16);
    });

    function validarE1(){
        let r_operador = document.getElementById("input-Roperador");
        let fechaCap = document.getElementById("input-fechaC");
        let fecha = document.getElementById("input-fecha");
        let reportante = document.getElementById("input-reportante");
        let turno = document.getElementById("input-turno");
        let operador = document.getElementById("input-operador");
        let jefe = document.getElementById("input-jefe");
        let servicio = document.getElementById("input-servicio");
        let localidad = document.getElementById("input-localidad");
        let lugar = document.getElementById("input-lugar");
        let ubicacion = document.getElementById("input-ubicacion");
        let personal1 = document.getElementById("input-personal1");
        let personal2 = document.getElementById("input-personal2");
        let personal3 = document.getElementById("input-personal3");

        if(fechaCap.value > fecha.value) fecha.setAttribute("class","form-control is-invalid");
        else fecha.setAttribute("class","form-control");
        if(r_operador.value == "") r_operador.setAttribute("class","form-select is-invalid");
        else r_operador.setAttribute("class","form-select");
        if(reportante.value == "") reportante.setAttribute("class","form-select is-invalid");
        else reportante.setAttribute("class","form-select");
        if(turno.value == "") turno.setAttribute("class","form-select is-invalid");
        else turno.setAttribute("class","form-select");
        if(jefe.value == "") jefe.setAttribute("class","form-select is-invalid");
        else jefe.setAttribute("class","form-select");
        if(servicio.value == "") servicio.setAttribute("class","form-select is-invalid");
        else servicio.setAttribute("class","form-select");
        if(localidad.value == "") localidad.setAttribute("class","form-select is-invalid");
        else localidad.setAttribute("class","form-select");
        if(lugar.value == "") lugar.setAttribute("class","form-select is-invalid");
        else lugar.setAttribute("class","form-select");
        if(ubicacion.value == "") ubicacion.setAttribute("class","form-select is-invalid");
        else ubicacion.setAttribute("class","form-select");

        //Validaciones de Operadores
        if(operador.value == ""){
            document.getElementById("alert-operador").innerHTML = "Seleccione alguna opción";
            operador.setAttribute("class","form-select is-invalid");
        } 
        else{
            if(operador.value == r_operador.value){
                document.getElementById("alert-operador").innerHTML = "El operador no puede ser el mismo que el Radio Operador";
                operador.setAttribute("class","form-select is-invalid");
            }else operador.setAttribute("class","form-select");
        }

        let alertO1 = document.getElementById("alert-personalUno");
        let alertO2 = document.getElementById("alert-personalDos");
        let alertO3 = document.getElementById("alert-personalTres");
        if(personal1.value == ""){
            alertO1.innerHTML = "Seleccione alguna opción"
            personal1.setAttribute("class","form-select is-invalid");
        }
        if(personal2.value == ""){
            alertO2.innerHTML = "Seleccione alguna opción"
            personal1.setAttribute("class","form-select is-invalid");
        }
        if(personal3.value == ""){
            alertO3.innerHTML = "Seleccione alguna opción"
            personal1.setAttribute("class","form-select is-invalid");
        }
    }
</script>