@extends('layout.app')

@section('content')
<div class="container" id="form_container">
    <h1 class="title_form">Reporte de Radio</h1>
    <form class="principal_form">
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Fecha</label>
            <div class="col-sm-9">
            <input type="datetime-local" class="form-control" id="input_date">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Área</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="input_area">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Unidad</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="input_unit">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Incidente</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="input_incident">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Ubicación</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="input_location">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Fecha</label>
            <div class="col-sm-9">
            <input type="datetime-local" class="form-control" id="input_date">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Área</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="input_area">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Unidad</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="input_unit">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Incidente</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="input_incident">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 input-label">Ubicación</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="input_location">
            </div>
        </div>
        <div class="text-center" style="margin: 2rem;">
            <button type="submit" class="btn btn-success">Registrar</button>
        </div>
    </form>
</div>
@stop