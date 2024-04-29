@extends('layout.app')

@section('content')
<div class="table-container">
    <h1 style="margin: 2rem; text-align: center;">CONTROL DE USUARIOS</h1>
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col col-sm-9">
            <div class="row">
                <div class="col col-sm-6">
                    <select class="form-select" onchange="updateFilters()" aria-label="Default select example" id="id_rol">
                        <option value="0">Roles</option>
                        @foreach ($tipo as $option)
                            <option value={{$option->id}}>{{$option->descripcion}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col col-sm-6">
                    <select class="form-select" id="id_estado" onchange="updateFilters()" aria-label="Default select example">
                        <option value="0">Filtro de Estado</option>
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col col-sm-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#NuevoCatalogo">Nuevo Usuario</button>
        </div>
    </div>
    <table id="tabla" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th><th>Tipo</th><th>Email</th><th>Estado</th><th>Opciones</th>
            </tr>
        </thead>
    </table>
</div>

@include('scripts.scripts-usuarios')
@include('tablas.datatables')
<script>
    $(document).ready(function() {
        createDataTable("{{route('get-usuarios')}}");
    });
</script>
@stop