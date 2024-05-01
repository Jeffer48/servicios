@extends('layout.app')

@section('content')
<div class="table-container">
    <h1 style="margin: 2rem; text-align: center;">REPORTES</h1>
    <table id="tabla" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Área</th>
                <th>Unidad</th>
                <th>Incidente</th>
                <th>Ubicación</th>
                <th>Fecha</th>
                <th>Usuario</th>
            </tr>
        </thead>
    </table>
</div>

@include('scripts.scripts-reportes')
@include('tablas.datatables')
@stop