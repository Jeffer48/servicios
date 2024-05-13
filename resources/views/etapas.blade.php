@extends('layout.app')

@section('content')
<div style="display: grid; grid-template-columns: 85% 15%;">
    <div style="grid-column: 1;" id="form_container">
        <div id="primera_etapa" style="display: block;">
            <h1 class="title_form">Primera Etapa</h1>
            <div class="principal_form">
                <x-select label="Radio Operador" name="Roperador" text="Seleccione un Operador" :options="$personal" id="input-Roperador" size="3"></x-select>
                <x-input-disabled label="Fecha de Captura" name="fechaC" value="{{$fecha}}" type="datetime-local" text="Ingrese una fecha" id="input-fechaC" size="3"></x-input-disabled>
                <x-input-disabled label="Área" name="area" value="{{$area}}" type="text" text="Ingrese un área" id="input-area" size="3"></x-input-disabled>
                <x-select label="Reportante" name="reportante" text="Seleccione un Reportante" :options="$reportante" id="input-reportante" size="3"></x-select>
                <x-input-disabled label="Folio Interno" name="folio_interno" value="{{$folio}}" type="text" text="Ingrese un área" id="input-folioI" size="3"></x-input-disabled>
                <x-select label="Turno" name="turno" text="Seleccione un Turno" :options="$turno" id="input-turno" size="3"></x-select>
                <x-input label="Fecha" name="fecha" type="datetime-local" text="La fecha no puede ser menor que la de captura" id="input-fecha" size="3" placeh=""></x-input>
                <x-input-disabled label="Unidad" name="unidad" value="{{$unidad}}" type="text" text="Ingrese una unidad" id="input-unidad" size="3"></x-input-disabled>
                <x-select label="Operador" name="operador" text="Seleccione un Operador" :options="$personal" id="input-operador" size="3"></x-select>
                <x-select label="Jefe de Servicio" name="jefe" text="Seleccione un Jefe de Servicio" :options="$personal" id="input-jefe" size="3"></x-select>
                <x-select label="Personal 1" name="personalUno" text="Seleccione al Personal" :options="$personal" id="input-personal1" size="3"></x-select>
                <x-select label="Personal 2" name="personalDos" text="Seleccione al Personal" :options="$personal" id="input-personal2" size="3"></x-select>
                <x-select label="Personal 3" name="personalTres" text="Seleccione al Personal" :options="$personal" id="input-personal3" size="3"></x-select>
                <x-select label="Personal 4" name="personalCuatro" text="Seleccione al Personal" :options="$personal" id="input-personal4" size="3"></x-select>
                <x-select label="Tipo de servicio" name="servicio" text="Seleccione el tipo de Servicio" :options="$servicio" id="input-servicio" size="3"></x-select>
                <x-select label="Localidad" name="localidad" text="Seleccione la Localidad" :options="$localidad" id="input-localidad" size="3"></x-select>
                <x-select label="Lugar del incidente" name="lugar" text="Seleccione el Lugar del Incidente" :options="$lugares" id="input-lugar" size="3"></x-select>
                <x-input label="Ubicacion" name="ubicacion" type="text" text="Ingrese una ubicación" id="input-ubicacion" size="3" placeh=""></x-input>
                <div class="text-center" style="margin: 2rem;">
                    <button type="submit" onclick="siguiente(2)" class="btn btn-success">Siguiente</button>
                </div>
            </div>
        </div>
        <div id="segunda_etapa" style="display: none;">
            <h1 class="title_form">Segunda Etapa</h1>
            <div class="principal_form">
                <x-input-disabled label="Folio Interno" name="folio_interno_e2" value="{{$folio}}" type="text" text="Ingrese el folio" id="input-folio_e2" size="3"></x-input-disabled>
                <div class="text-center" style="margin: 2rem;">
                    <button type="submit" onclick="siguiente(3)" class="btn btn-success">Siguiente</button>
                </div>
            </div>
        </div>
        <div id="tercera_etapa" style="display: none;">
            <h1 class="title_form">Tercera Etapa</h1>
            <h5 class="subtitle_form">Datos del Paciente</h5>
            <div class="principal_form">
                <x-select label="Prioridad" name="prioridad" text="Seleccione la Prioridad" :options="$prioridad" id="input-prioridad" size="3"></x-select>
                <x-input label="Nombre" name="nombreP" type="text" text="Ingrese el nombre del paciente" id="input-nombreP" size="3" placeh=""></x-input>
                <x-select label="Sexo" name="sexoP" text="Seleccione el sexo del paciente" :options="$sexo" id="input-sexoP" size="3"></x-select>
                <x-input label="Edad" name="edadP" type="number" text="Ingrese una edad valida" id="input-edadP" size="3" placeh=""></x-input>
                <x-select label="Apoyo Brindado" name="apoyo" text="Seleccione el tipo de apoyo brindado" :options="$apoyo" id="input-apoyo" size="3"></x-select>
                <x-select label="Destino" name="destino" text="Seleccione el destino" :options="$destino" id="input-destino" size="3"></x-select>
                <x-select label="Hospital" name="hospital" text="Seleccione el hospital" :options="$hospital" id="input-hospital" size="3"></x-select>
                <div class="text-center" style="margin: 2rem;">
                    <button type="submit" onclick="siguiente(4)" class="btn btn-success">Siguiente</button>
                </div>
            </div>
        </div>
        <div id="cuarta_etapa" style="display: none;">
            <h1 class="title_form">Cuarta Etapa</h1>
            <div class="principal_form">
                <x-input label="Descripción" name="descripcion" type="text" text="Ingrese una descripción del evento" id="input-descripcion" size="3" placeh="Describa el evento"></x-input>
                <x-input label="Incorporación" name="horaI" type="datetime-local" text="No puede ser menor que la fecha de captura" id="input-horaI" size="3" placeh=""></x-input>
                <div class="text-center" style="margin: 2rem;">
                    <button type="submit" onclick="siguiente(5)" class="btn btn-success">Siguiente</button>
                </div>
            </div>
        </div>
        <div id="quinta_etapa" style="display: none;">
            <h1 class="title_form">Quinta Etapa</h1>
            <div class="principal_form">
                <x-input label="Folio CRUM" name="crum" type="text" text="Ingrese el folio CRUM" id="input-crum" size="3" placeh=""></x-input>
                <x-input label="Folio C5i" name="C5i" type="text" text="Ingrese el folio C5i" id="input-c5i" size="3" placeh=""></x-input>
                <div class="text-center" style="margin: 2rem;">
                    <button type="submit" id="btn-guardar-etapas" onclick="validarTodo()" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="estatus_etapas" style="grid-column: 2;">
        <button onclick="siguiente(1)" id="E1">E1</button>
        <button onclick="siguiente(2)" id="E2">E2</button>
        <button onclick="siguiente(3)" id="E3">E3</button>
        <button onclick="siguiente(4)" id="E4">E4</button>
        <button onclick="siguiente(5)" id="E5">E5</button>
    </div>
</div>

@include('scripts.scripts-etapas')
@endsection