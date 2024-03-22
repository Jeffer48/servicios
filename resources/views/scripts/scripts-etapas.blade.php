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
        if(ubicacion.value == "") ubicacion.setAttribute("class","form-control is-invalid");
        else ubicacion.setAttribute("class","form-control");

        //Validaciones de Operadores
        let alertRO = document.getElementById("alert-Roperador");
        let alertOP = document.getElementById("alert-operador");
        let alertO1 = document.getElementById("alert-personalUno");
        let alertO2 = document.getElementById("alert-personalDos");
        let alertO3 = document.getElementById("alert-personalTres");

        if(r_operador.value == "") personalVacio(r_operador,alertRO); 
        else personalRepetido(r_operador,operador,personal1,personal2,personal3,alertRO);

        if(operador.value == "") personalVacio(operador,alertOP); 
        else personalRepetido(operador,r_operador,personal1,personal2,personal3,alertOP);

        if(personal1.value == "") personalVacio(personal1,alertO1); 
        else personalRepetido(personal1,operador,r_operador,personal2,personal3,alertO1);

        if(personal2.value == "") personalVacio(personal2,alertO2);
        else personalRepetido(personal2,operador,personal1,r_operador,personal3,alertO2);

        if(personal3.value == "") personalVacio(personal3,alertO3);
        else personalRepetido(personal3,operador,personal1,personal2,r_operador,alertO3);
    }

    function personalVacio(personal,alert){
        alert.innerHTML = "Seleccione alguna opción";
        personal.setAttribute("class","form-select is-invalid");
    }

    function personalRepetido(p,p2,p3,p4,p5,alert){
        if(p.value==p2.value||p.value==p3.value||p.value==p4.value||p.value==p5.value){
            alert.innerHTML = "Personal repetido";
            p.setAttribute("class","form-select is-invalid");
        }else p.setAttribute("class","form-select");
    }
</script>