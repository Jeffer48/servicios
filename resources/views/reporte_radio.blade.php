@extends('layout.app')

@section('content')
<div>
    <div style="width: 80% !important;" id="form_container">
        <h1 class="title_form">Reporte de Radio</h1>
        <form class="principal_form" action="{{route('registrar')}}" method="POST" id="form-radio-create">
            @csrf
            <x-input-disabled label="Fecha" name="fecha" value="{{$fecha}}" type="datetime-local" text="Ingrese una fecha" id="input-fecha" size="3"></x-input-disabled>
            <x-select label="Área" name="area" text="Seleccione un área" :options="$areas" id="input-area" size="3"></x-select>
            <x-select label="Unidad" name="unidad" text="Seleccione una unidad" :options="$unidades" id="input-unidad" size="3"></x-select>
            <x-select label="Incidente" name="incidente" text="Seleccione un tipo de incidente" :options="$incidentes" id="input-incidente" size="3"></x-select>
            <x-input label="Ubicación" name="ubicacion" type="text" text="Ingrese una ubicación" id="input-ubicacion" size="3" placeh=""></x-input>
            <div class="text-center" style="margin: 2rem;">
                <button id="btn-registar-radio" onclick="envioReporte()" class="btn btn-success" type="button">Registrar</button>
            </div>
        </form>
    </div>
</div>

<script>
    var now = 0;
    $(document).ready(function() {
        now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
    });

    function envioReporte(){
        document.getElementById('input-fecha').value = now.toISOString().slice(0,16);
        let area = document.getElementById("input-area");
        let unidad = document.getElementById("input-unidad");
        let incidente = document.getElementById("input-incidente");
        let ubicacion = document.getElementById("input-ubicacion");

        let terminado = true;
        if(area.value == ""){area.setAttribute("class","form-select is-invalid"); terminado = false;}
        else area.setAttribute("class","form-select");

        if(unidad.value == ""){unidad.setAttribute("class","form-select is-invalid"); terminado = false;}
        else unidad.setAttribute("class","form-select");

        if(incidente.value == ""){incidente.setAttribute("class","form-select is-invalid"); terminado = false;}
        else incidente.setAttribute("class","form-select");

        if(ubicacion.value == ""){ubicacion.setAttribute("class","form-control is-invalid"); terminado = false;}
        else ubicacion.setAttribute("class","form-control");

        if(terminado) $('#form-radio-create').submit();
    }
</script>
@stop