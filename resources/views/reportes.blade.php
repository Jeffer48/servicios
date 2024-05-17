@extends('layout.app')

@section('content')
<div class="table-container">
    <h1 style="margin: 2rem; text-align: center;">REPORTES</h1>
    <table id="tabla" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Unidad</th>
                <th>Incidente</th>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
    </table>
</div>

@include('modal.modal-vista-servicios')
@include('scripts.scripts-reportes')
@include('tablas.datatables')
@stop