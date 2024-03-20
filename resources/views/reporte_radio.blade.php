@extends('layout.app')

@section('content')
<div style="display: grid; grid-template-columns: 70% 30%;">
    <div style="grid-column: 1;" id="form_container">
        <h1 class="title_form">Reporte de Radio</h1>
        <form class="principal_form" action="{{route('registrar')}}" method="POST">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-3 input-label">Fecha</label>
                <div class="col-sm-9">
                <input type="datetime-local" readonly="true"  name="fecha" class="form-control" id="input-fecha">
                </div>
            </div>
            <x-select label="Área" name="area" text="Seleccione un área" :options="$areas" id="input-area" size="3"></x-select>
            <x-select label="Unidad" name="unidad" text="Seleccione una unidad" :options="$unidades" id="input-unidad" size="3"></x-select>
            <x-select label="Incidente" name="incidente" text="Seleccione un tipo de incidente" :options="$incidentes" id="input-incidente" size="3"></x-select>
            <x-input label="Ubicación" name="ubicacion" type="text" text="Ingrese una ubicación" id="input-ubicacion" size="3"></x-input>
            <div class="text-center" style="margin: 2rem;">
                <button onclick="envioReporte()" class="btn btn-success" type="submit">Registrar</button>
            </div>
        </div>
    </form>
    <div style="grid-column: 2;" id="services_container">
        <div class="active_services">
            <div class="target_services" style="grid-column: 2;">
        
            </div>
        </div>
    </div>
</div>

<script>
    var now = 0;
    $(document).ready(function() {
        now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        document.getElementById('input-fecha').value = now.toISOString().slice(0,16);
    });

    function setDate(){
        now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        document.getElementById('input-fecha').value = now.toISOString().slice(0,16);
    }

    function envioReporte(){
        document.getElementById('input-fecha').value = now.toISOString().slice(0,16);
        let area = document.getElementById("input-area");
        let unidad = document.getElementById("input-unidad");
        let incidente = document.getElementById("input-incidente");
        let ubicacion = document.getElementById("input-ubicacion");

        if(area.value == "") area.setAttribute("class","form-select is-invalid");
        else area.setAttribute("class","form-select");

        if(unidad.value == "") unidad.setAttribute("class","form-select is-invalid");
        else unidad.setAttribute("class","form-select");

        if(incidente.value == "") incidente.setAttribute("class","form-select is-invalid");
        else incidente.setAttribute("class","form-select");

        if(ubicacion.value == "") ubicacion.setAttribute("class","form-control is-invalid");
        else ubicacion.setAttribute("class","form-control");
    }
</script>
@stop