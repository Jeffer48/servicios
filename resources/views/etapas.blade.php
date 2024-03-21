@extends('layout.app')

@section('content')
<div class="container" id="form_container">
    <h1 class="title_form">Primera Etapa</h1>
    <div class="principal_form">
        @csrf
        <x-select label="Radio Operador" name="Roperador" text="Seleccione un Operador" :options="$personal" id="input-Roperador" size="3"></x-select>
        <x-input-disabled label="Fecha de Captura" name="fechaC" value="{{$fecha}}" type="datetime-local" text="Ingrese una fecha" id="input-fechaC" size="3"></x-input-disabled>
        <x-input-disabled label="Área" name="area" value="{{$area}}" type="text" text="Ingrese un área" id="input-area" size="3"></x-input-disabled>
        <x-select label="Reportante" name="reportante" text="Seleccione un Reportante" :options="$reportante" id="input-reportante" size="3"></x-select>
        <x-input-disabled label="Folio Interno" name="folio_interno" value="{{$folio_interno}}" type="text" text="Ingrese un área" id="input-folioI" size="3"></x-input-disabled>
        <x-select label="Turno" name="turno" text="Seleccione un Turno" :options="$turno" id="input-turno" size="3"></x-select>
        <x-input label="Fecha" name="fecha" type="datetime-local" text="La fecha no puede ser menor que la de captura" id="input-fecha" size="3"></x-input>
        <x-input-disabled label="Unidad" name="unidad" value="{{$unidad}}" type="text" text="Ingrese una unidad" id="input-unidad" size="3"></x-input-disabled>
        <x-select label="Operador" name="operador" text="Seleccione un Operador" :options="$personal" id="input-operador" size="3"></x-select>
        <x-select label="Jefe de Servicio" name="jefe" text="Seleccione un Jefe de Servicio" :options="$jefe" id="input-jefe" size="3"></x-select>
        <x-select label="Personal 1" name="personalUno" text="Seleccione al Personal" :options="$personal" id="input-personal1" size="3"></x-select>
        <x-select label="Personal 2" name="personalDos" text="Seleccione al Personal" :options="$personal" id="input-personal2" size="3"></x-select>
        <x-select label="Personal 3" name="personalTres" text="Seleccione al Personal" :options="$personal" id="input-personal3" size="3"></x-select>
        <x-select label="Tipo de servicio" name="servicio" text="Seleccione el tipo de Servicio" :options="$servicio" id="input-servicio" size="3"></x-select>
        <x-select label="Localidad" name="localidad" text="Seleccione la Localidad" :options="$localidad" id="input-localidad" size="3"></x-select>
        <x-select label="Lugar del incidente" name="lugar" text="Seleccione el Lugar del Incidente" :options="$lugares" id="input-lugar" size="3"></x-select>
        <x-input label="Ubicacion" name="ubicacion" type="text" text="Ingrese una ubicación" id="input-ubicacion" size="3"></x-input>
        <div class="text-center" style="margin: 2rem;">
            <button type="submit" onclick="validarE1()" class="btn btn-success">Siguiente</button>
        </div>
    </div>
</div>

@include('scripts.scripts-etapas')
@endsection