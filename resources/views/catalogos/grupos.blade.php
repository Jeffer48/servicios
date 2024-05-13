@extends('layout.app')

@section('content')
<div class="table-container">
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col text-start">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#NuevoGrupo">Nuevo Grupo</button>
        </div>
    </div>
    <h1 style="margin: 2rem; text-align: center;">TABLA DE GRUPOS</h1>
    <table id="tabla" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Grupo</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal Grupo -->
<div class="modal fade" id="NuevoGrupo" tabindex="-1" aria-labelledby="NuevoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="NuevoModalLabel">Agregar Grupo</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger" id="grupoAlert" role="alert" style="display: none;">
                El campo no puede ir vacio
            </div>
            <input type="text" class="form-control" id="input-nuevoGrupo" placeholder="Ingrese un valor" required>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="guardar(2)" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>

@include('scripts.scripts-catalogos')
@include('tablas.datatables')
<script>
    $(document).ready(function() {
        createDataTable("{{route('get-grupos')}}");
    });
</script>
@stop