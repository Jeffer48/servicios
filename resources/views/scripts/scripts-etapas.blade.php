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

        if(fechaCap.value > fecha.value) fecha.setAttribute("class","form-control is-invalid");
        else fecha.setAttribute("class","form-control");
        if(r_operador.value == "") r_operador.setAttribute("class","form-select is-invalid");
        else r_operador.setAttribute("class","form-select");
        if(reportante.value == "") reportante.setAttribute("class","form-select is-invalid");
        else reportante.setAttribute("class","form-select");
        if(turno.value == "") turno.setAttribute("class","form-select is-invalid");
        else turno.setAttribute("class","form-select");
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
        if(jefe.value == "") jefe.setAttribute("class","form-select is-invalid");
        else jefe.setAttribute("class","form-select");
    }
</script>