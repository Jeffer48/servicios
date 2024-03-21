@extends('layout.app')

@section('content')
<div class="container" id="form_container">
    <h1 class="title_form">Primera Etapa</h1>
    <div class="principal_form">
        @csrf
        <x-select label="Radio Operador" name="Roperador" text="Seleccione un Operador" :options="$operador" id="input-Roperador" size="3"></x-select>
        <x-input-disabled label="Fecha de Captura" name="fechaC" value="{{$fecha}}" type="datetime-local" text="Ingrese una fecha" id="input-fechaC" size="3"></x-input-disabled>
        <x-input-disabled label="Área" name="area" value="{{$area}}" type="text" text="Ingrese un área" id="input-area" size="3"></x-input-disabled>
        <x-select label="Reportante" name="reportante" text="Seleccione un Reportante" :options="$reportante" id="input-reportante" size="3"></x-select>
        <x-input-disabled label="Folio Interno" name="folio_interno" value="{{$folio_interno}}" type="text" text="Ingrese un área" id="input-folioI" size="3"></x-input-disabled>
        <x-select label="Turno" name="turno" text="Seleccione un Turno" :options="$turno" id="input-turno" size="3"></x-select>
        <x-input label="Fecha" name="fecha" type="datetime-local" text="La fecha no puede ser menor que la de captura" id="input-fecha" size="3"></x-input>
        <x-input-disabled label="Unidad" name="unidad" value="{{$unidad}}" type="text" text="Ingrese una unidad" id="input-unidad" size="3"></x-input-disabled>
        <x-select label="Operador" name="operador" text="Seleccione un Operador" :options="$operador" id="input-operador" size="3"></x-select>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Jefe de servicio</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_jefe">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Personal 1</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_personal_uno">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Personal 2</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_personal_dos">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Personal 3</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_personal_tres">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Tipo de servicio</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_tipo_servicio">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Localidad</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_localidad">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Lugar del incidente</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_lugar">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Ubicacion</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_ubicacion">
            </div>
        </div>
        <div class="text-center" style="margin: 2rem;">
            <button type="submit" onclick="validarE1()" class="btn btn-success">Siguiente</button>
        </div>
    </div>
</div>

@include('scripts.scripts-etapas')
@endsection