<script>
    var now = 0;
    $(document).ready(function() {
        now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        document.getElementById('input-fecha').value = now.toISOString().slice(0,16);
    });

    //Estatus de las etapas
    let terminadoE1 = 0;
    let terminadoE2 = 2;
    let terminadoE3 = 0;
    let terminadoE4 = 0;

    //Formulario de etapas
    let formE1 = document.getElementById("primera_etapa");
    let formE2 = document.getElementById("segunda_etapa");
    let formE3 = document.getElementById("tercera_etapa");
    let formE4 = document.getElementById("cuarta_etapa");
    let formE5 = document.getElementById("quinta_etapa");

    //Valores de la Primera Etapa
    let r_operador = document.getElementById("input-Roperador");
    let fechaCap = document.getElementById("input-fechaC"); //No necesita guardarse
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
    //Valores de la Tercera Etapa
    let prioridad = document.getElementById("input-prioridad");
    let nombreP = document.getElementById("input-nombreP");
    let sexoP = document.getElementById("input-sexoP");
    let edadP = document.getElementById("input-edadP");
    let apoyo = document.getElementById("input-apoyo");
    let destino = document.getElementById("input-destino");
    let hospital = document.getElementById("input-hospital");
    //Valores de la Cuarta Etapa
    let descripcion = document.getElementById("input-descripcion");
    let horaIB = document.getElementById("input-horaI");
    //Valores de la Quinta Etapa
    let crum = document.getElementById("input-crum");
    let c5i = document.getElementById("input-c5i");

    function validarE1(sig){
        let terminado = true;

        if(fechaCap.value > fecha.value) fecha.setAttribute("class","form-control is-invalid");
        else fecha.setAttribute("class","form-control");
        terminado = vacio(terminado,r_operador,"select");
        terminado = vacio(terminado,reportante,"select");
        terminado = vacio(terminado,turno,"select");
        terminado = vacio(terminado,jefe,"select");
        terminado = vacio(terminado,servicio,"select");
        terminado = vacio(terminado,localidad,"select");
        terminado = vacio(terminado,lugar,"select");
        terminado = vacio(terminado,ubicacion,"control");

        //Validaciones de Operadores
        let alertRO = document.getElementById("alert-Roperador");
        let alertOP = document.getElementById("alert-operador");
        let alertO1 = document.getElementById("alert-personalUno");
        let alertO2 = document.getElementById("alert-personalDos");
        let alertO3 = document.getElementById("alert-personalTres");

        if(r_operador.value == "") terminado = personalVacio(r_operador,alertRO);
        else terminado = personalRepetido(r_operador,operador,personal1,personal2,personal3,alertRO,terminado);

        if(operador.value == "") terminado = personalVacio(operador,alertOP); 
        else terminado = personalRepetido(operador,r_operador,personal1,personal2,personal3,alertOP,terminado);

        if(personal1.value == "") terminado = personalVacio(personal1,alertO1); 
        else terminado = personalRepetido(personal1,operador,r_operador,personal2,personal3,alertO1,terminado);

        if(personal2.value == "") terminado = personalVacio(personal2,alertO2);
        else terminado = personalRepetido(personal2,operador,personal1,r_operador,personal3,alertO2,terminado);

        if(personal3.value == "") terminado = personalVacio(personal3,alertO3);
        else terminado = personalRepetido(personal3,operador,personal1,personal2,r_operador,alertO3,terminado);
        
        if(terminado) terminadoE1 = 2;
        else terminadoE1 = 1;

        if(sig) siguiente(1,formE1);
    }

    function validarE2(sig){
        if(sig) siguiente(2,formE2);
    }

    function validarE3(sig){
        let terminado = true;
        terminado = vacio(terminado,prioridad,"select");
        terminado = vacio(terminado,nombreP,"control");
        terminado = vacio(terminado,sexoP,"select");
        terminado = vacio(terminado,edadP,"control");
        terminado = vacio(terminado,apoyo,"select");
        terminado = vacio(terminado,destino,"select");
        terminado = vacio(terminado,hospital,"select");

        if(terminado) terminadoE3 = 2;
        else terminadoE3 = 1;

        if(sig){
            let horaV = new Date();
            horaV.setMinutes(horaV.getMinutes() - horaV.getTimezoneOffset());
            document.getElementById('input-horaI').value = horaV.toISOString().slice(0,16);
            siguiente(3,formE3);
        }
    }

    function validarE4(sig){
        let terminado = true;

        terminado = vacio(terminado,descripcion,"control");
        if(fechaCap.value > horaIB.value){
            fecha.setAttribute("class","form-control is-invalid");
            terminado = false;
        }
        else fecha.setAttribute("class","form-control");
        
        if(terminado) terminadoE4 = 2;
        else terminadoE4 = 1;

        if(sig) siguiente(4,formE4);
    }

    function guardar(){
        let terminado = false;
    }

    function siguiente(an,actual){
        actual.style.display="none";

        switch(an){
            case 1: formE2.style.display="block"; break;
            case 2: formE3.style.display="block"; break;
            case 3: formE4.style.display="block"; break;
            case 4: formE5.style.display="block"; break;
        }
    }

    function vacio(terminado,inputV,tipo){
        let clase = "form-control";
        if(tipo == "select") clase = "form-select";

        if(inputV.value == ""){
            inputV.setAttribute("class",clase+" is-invalid");
            terminado = false;
        }
        else inputV.setAttribute("class",clase);

        return terminado;
    }

    function personalVacio(personal,alert){
        alert.innerHTML = "Seleccione alguna opción";
        personal.setAttribute("class","form-select is-invalid");
        return false;
    }

    function personalRepetido(p,p2,p3,p4,p5,alert,terminado){
        if(p.value==p2.value||p.value==p3.value||p.value==p4.value||p.value==p5.value){
            alert.innerHTML = "Personal repetido";
            p.setAttribute("class","form-select is-invalid");
            return terminado;
        }else{
            p.setAttribute("class","form-select");
            return terminado;
        }
    }
</script>