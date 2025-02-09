@extends('layout.app')

@section('content')
<div>
    <div style="width: 80% !important;" id="form_container">
        <h1 class="title_form">Carga de Combustible</h1>
        <form class="principal_form" id="form-radio-create">
            @csrf
            <x-input-disabled label="Fecha" name="fecha" value="{{$fecha}}" type="datetime-local" text="Ingrese una fecha" id="input-fecha" size="3"></x-input-disabled>
            <x-select label="Jefe de Turno" name="jefe" text="Seleccione un jefe" :options="$personal" id="input-jefe" size="3"></x-select>
            <x-select label="Operador" name="operador" text="Seleccione un operador" :options="$personal" id="input-operador" size="3"></x-select>
            <x-select label="Unidad" name="unidad" text="Seleccione una unidad" :options="$unidades" id="input-unidad" size="3"></x-select>
            <x-input label="Kilometraje" name="kilometraje" type="number" text="Ingrese el kilometraje" id="input-kilometraje" size="3" placeh=""></x-input>
            <x-input label="Importe cargado" name="importe" type="number" text="Ingrese el importe cargado" id="input-importe" size="3" placeh=""></x-input>
            <x-input label="Litros cargados" name="litros" type="number" text="Ingrese los litros cargados" id="input-litros" size="3" placeh=""></x-input>
            <x-input label="Folio Ticket" name="folio" type="text" text="Ingrese el folio del ticket" id="input-folio" size="3" placeh=""></x-input>
            <div class="row mb-3">
                <label class="col-sm-4 input-label">Observaciones</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="observaciones" id="input-observaciones" value="" cols="30" rows="5"></textarea>
                </div>
            </div>
            <div class="text-center" style="margin: 2rem;">
                <button onclick="validarDatos()" class="btn btn-success" type="button">Guardar</button>
            </div>
        </form>
    </div>
</div>
@include('scripts.scripts-carga')
@stop