@extends('layout.app')

@section('content')
<div class="container" id="form_container">
    <h1 class="title_form">Reporte de Radio</h1>
    <div class="principal_form">
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Fecha</label>
            <div class="col-sm-9">
            <input type="datetime-local" disabled class="form-control" id="input_fecha">
            </div>
        </div>
        <x-select type="Área" :options="$areas"></x-select>
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Unidad</label>
            <div class="col-sm-9">
                <select class="form-select" aria-label="Default select example" id="input_unidad" required>
                    <option value="" disabled selected>Seleccione una unidad</option>
                    @foreach ($unidades as $unidad)
                        <option value={{$unidad->id}}>{{$unidad->descripcion}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Seleccione alguna opción
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Incidente</label>
            <div class="col-sm-9">
                <select class="form-select" aria-label="Default select example" id="input_incidente" required>
                    <option disabled value="" selected>Seleccione un tipo de incidente</option>
                    @foreach ($incidentes as $incidente)
                        <option value={{$incidente->id}}>{{$incidente->descripcion}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Seleccione alguna opción
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Ubicación</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="input_ubicacion" required>
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
        document.getElementById('input_fecha').value = now.toISOString().slice(0,16);
    });

    function envioReporte(){
        let fecha = document.getElementById("input_fecha");
        let area = document.getElementById("input_area");
        let unidad = document.getElementById("input_unidad");
        let incidente = document.getElementById("input_incidente");
        let ubicacion = document.getElementById("input_ubicacion");

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