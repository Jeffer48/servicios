<script>
    var now = 0;
    let id_reporte = {{$id_reporte_radio}};

    $(document).ready(function() {
        now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        document.getElementById('input-fecha').value = now.toISOString().slice(0,16);
        document.getElementById('input-horaI').value = now.toISOString().slice(0,16);
    });

    //Estatus de las etapas
    let terminadoE1 = 0;
    let terminadoE2 = 2;
    let terminadoE3 = 0;
    let terminadoE4 = 0;
    let terminadoE5 = 0;

    //Formulario de etapas
    let formE1 = document.getElementById("primera_etapa");
    let formE2 = document.getElementById("segunda_etapa");
    let formE3 = document.getElementById("tercera_etapa");
    let formE4 = document.getElementById("cuarta_etapa");
    let formE5 = document.getElementById("quinta_etapa");
    let etapaActual = formE1;

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

    //Botones de Etapas
    let bE1 = document.getElementById("E1");
    let bE2 = document.getElementById("E2");
    let bE3 = document.getElementById("E3");
    let bE4 = document.getElementById("E4");
    let bE5 = document.getElementById("E5");
    let btnActual = bE1;
    let actual = 1;

    function validarE1(){
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
    }

    function validarE3(){
        let terminado = true;
        terminado = vacio(terminado,prioridad,"select");
        terminado = vacio(terminado,nombreP,"control");
        terminado = vacio(terminado,sexoP,"select");
        terminado = vacio(terminado,apoyo,"select");
        terminado = vacio(terminado,destino,"select");
        terminado = vacio(terminado,hospital,"select");
        let edadEntero = edadP.value % 1;
        if(edadP.value >= 0 && edadP.value <= 130 && edadEntero == 0 && edadP.value != '')edadP.setAttribute("class","form-control");
        else{
            edadP.setAttribute("class","form-control is-invalid");
            terminado = false;
        }

        if(terminado) terminadoE3 = 2;
        else terminadoE3 = 1;
    }

    function validarE4(){
        let terminado = true;

        terminado = vacio(terminado,descripcion,"control");
        if(fechaCap.value > horaIB.value){
            fecha.setAttribute("class","form-control is-invalid");
            terminado = false;
        }
        else fecha.setAttribute("class","form-control");
        
        if(terminado) terminadoE4 = 2;
        else terminadoE4 = 1;
    }

    function validarE5(){
        let terminado = true;

        terminado = vacio(terminado,crum,"control");
        terminado = vacio(terminado,c5i,"control");

        if(terminado) terminadoE5 = 2;
        else terminadoE5 = 1;
    }

    function validarTodo(){
        validarE5();
        let package = {
            id_reporte_radio: id_reporte,
            id_tipo: {{$id_area}},
            folio_num: {{$folio_num}},
            folio: '{{$folio}}',
            id_radio_operador: r_operador.value,
            id_reportante: reportante.value,
            id_turno: turno.value,
            fecha: fecha.value,
            id_operador: operador.value,
            id_jefe: jefe.value,
            id_personal_1: personal1.value,
            id_personal_2: personal2.value,
            id_personal_3: personal3.value,
            id_tipo_servicio: servicio.value,
            id_localidad: localidad.value,
            id_lugar: lugar.value,
            ubicacion: ubicacion.value,
            id_prioridad: prioridad.value,
            nombre: nombreP.value,
            id_sexo: sexoP.value,
            edad: edadP.value,
            id_apoyo: apoyo.value,
            id_destino: destino.value,
            id_hospital: hospital.value,
            desc_evento: descripcion.value,
            incorporacion: horaIB.value,
            folio_crum: crum.value,
            folio_c5i: c5i.value
        };

        if(terminadoE1 != 2||terminadoE2 != 2||terminadoE3 != 2||terminadoE4 != 2){
            Swal.fire({
                title: "Hay etapas sin terminar!",
                text: "Haz click para cerrar",
                icon: "error"
            });
        }
        else if(terminadoE5 == 2){
            $.ajax({
                url: "{{route('guardarEtapas')}}",
                type: 'POST',
                data: package,
                success: function(response){
                    Swal.fire({
                        title: "Datos guardados correctamente!",
                        text: "Haz click para cerrar",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Continuar"
                    }).then((result) => {
                        window.location.href = "/";
                    });
                }
            });
        }
    }

    function siguiente(sigEtapa){
        etapaActual.style.display = "none";

        switch(actual){
            case 1:
                validarE1();
                colorearBotones(btnActual,terminadoE1);
                break;
            case 2: break;
            case 3:
                validarE3();
                colorearBotones(btnActual,terminadoE3);
                break;
            case 4:
                validarE4();
                colorearBotones(btnActual,terminadoE4);
                break;
            case 5:
                colorearBotones(btnActual,1);
                break;
        }

        switch(sigEtapa){
            case 1: 
                etapaActual = formE1;
                btnActual = bE1;
                actual = 1;
                break;
            case 2: 
                etapaActual = formE2;
                btnActual = bE2;
                actual = 2;
                break;
            case 3: 
                etapaActual = formE3;
                btnActual = bE3;
                actual = 3;
                break;
            case 4: 
                etapaActual = formE4;
                btnActual = bE4;
                actual = 4;
                break;
            case 5: 
                etapaActual = formE5;
                btnActual = bE5;
                actual = 5;
                break;
        }

        etapaActual.style.display = "block";
    }

    function colorearBotones(boton,terminado){
        switch(terminado){
            case 0: boton.style.borderColor = "red"; break;
            case 1: boton.style.borderColor = "red green green red"; break;
            case 2: boton.style.borderColor = "green"; break;
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
            terminado = false;
            return terminado;
        }else{
            p.setAttribute("class","form-select");
            return terminado;
        }
    }
</script>