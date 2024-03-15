@extends('layout.app')

@section('content')
<div class="container" id="form_container">
    <h1 class="title_form">Reporte de Radio</h1>
    <div class="principal_form">
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Fecha</label>
            <div class="col-sm-9">
            <input type="datetime-local" disabled class="form-control" id="input-fecha">
            </div>
        </div>
        <x-select type="Área" text="Seleccione un área" :options="$areas" id="input-area" size="3"></x-select>
        <x-select type="Unidad" text="Seleccione una unidad" :options="$unidades" id="input-unidad" size="3"></x-select>
        <x-select type="Incidente" text="Seleccione un tipo de incidente" :options="$incidentes" id="input-incidente" size="3"></x-select>
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Ubicación</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="input-ubicacion" required>
                <div class="invalid-feedback">
                    Ingrese una ubicación
                </div>
            </div>
        </div>
        <div class="text-center" style="margin: 2rem;">
            <button onclick="envioReporte()" class="btn btn-success" type="submit">Registrar</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        document.getElementById('input-fecha').value = now.toISOString().slice(0,16);
    });

    function envioReporte(){
        let fecha = document.getElementById("input-fecha");
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