@extends('layout.app')

@section('content')
<div class="table-container">
    <h1 style="margin: 2rem; text-align: center;">REPORTES</h1>
    <table id="reportesTable" class="table table-striped" style="width:100%">
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
        <tbody>
            @foreach($radio as $item)
                <tr>
                    <td>{{$item->area}}</td>
                    <td>{{$item->unidad}}</td>
                    <td>{{$item->incidente}}</td>
                    <td>{{$item->ubicacion}}</td>
                    @php
                        $fecha = date_create($item->fecha);
                        $fecha = date_format($fecha,"Y/m/d H:i a")
                    @endphp
                    <td>{{$fecha}}</td>
                    <td>{{$item->usuario}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#reportesTable').DataTable(tableLabels);
    });
</script>
@stop