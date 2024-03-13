@extends('layout.app')

@section('content')
<div class="container" id="form_container">
    <h1 class="title_form">Primera Etapa</h1>
    <form class="principal_form">
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Radio Operador</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_operador">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Área</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_area">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Reportante</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_reportante">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Folio Interno</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_folio">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Turno</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_turno">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Fecha</label>
            <div class="col-sm-8">
            <input type="datetime-local" class="form-control" id="input_fecha">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Unidad</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_unidad">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 input-label">Operador</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="input_operador">
            </div>
        </div>
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
            <button type="submit" class="btn btn-success">Siguiente</button>
        </div>
    </form>
</div>
@endsection