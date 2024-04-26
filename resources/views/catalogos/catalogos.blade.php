@extends('layout.app')

@section('content')
<div class="table-container">
    <h1 style="margin: 2rem; text-align: center;">CATÁLOGOS</h1>
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col col-sm-9">
            <div class="row">
                <div class="col col-sm-6">
                    <select class="form-select" onchange="updateFiltersCatalogo()" aria-label="Default select example" id="id_grupo">
                        <option value="0">Filtro Grupos</option>
                        @foreach ($grupos as $option)
                            <option value={{$option->id}}>{{$option->grupo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col col-sm-6">
                    <select class="form-select" id="id_estado" onchange="updateFiltersCatalogo()" aria-label="Default select example">
                        <option value="0">Filtro de Estado</option>
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col col-sm-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#NuevoCatalogo">Nuevo Catálogo</button>
        </div>
    </div>
    <table id="tabla" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Grupo</th><th>Descripción</th><th>Estado</th><th>Opciones</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal Catalogo -->
<div class="modal fade" id="NuevoCatalogo" tabindex="-1" aria-labelledby="NuevoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="NuevoModalLabel">Agregar Catálogo</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger" id="catalogoAlert" role="alert" style="display: none;">
                El campo no puede ir vacio
            </div>
            <div class="row">
                <div class="col col-sm-4">
                    <select class="col form-select" id="id_grupo" aria-label="Default select example" id="grupos">
                        @foreach ($grupos as $option)
                            <option id="opt-{{$option->id}}" value={{$option->id}}>{{$option->grupo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="input-nuevoCatalogo" placeholder="Ingrese un valor" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="guardar(1)" id="btn-catalogo" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>

@include('scripts.scripts-catalogos')
@include('tablas.datatables')
<script>
    $(document).ready(function() {
        createDataTable("{{route('get-catalogo')}}");
    });
</script>
@stop