@extends('layout.app')

@section('content')
<div class="table-container">
    <h1 style="margin: 2rem; text-align: center;">CATÁLOGOS</h1>
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col col-sm-6">
            <form action="{{route('catalogos')}}" method="get">
                <select class="form-select" name="id_grupo" onchange="this.form.submit()" aria-label="Default select example" id="grupos">
                    <option id="opt-0" value="0">Todos</option>
                    @foreach ($grupos as $option)
                        @if ($option->id==$opt)
                            <option id="opt-{{$option->id}}" value={{$option->id}} selected>{{$option->grupo}}</option>
                        @else
                            <option id="opt-{{$option->id}}" value={{$option->id}}>{{$option->grupo}}</option>
                        @endif
                    @endforeach
                </select>
            </form>
        </div>
        <div class="col text-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#NuevoCatalogo">Nuevo Catálogo</button>
        </div>
    </div>
    <table id="catalogoTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Grupo</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catalogos as $catalogo)
                <tr>
                    <td>{{$catalogo->grupo}}</td>
                    <td>{{$catalogo->descripcion}}</td>
                    <td>
                        @if ($catalogo->deleted_at == null)
                            Activo
                        @else Inactivo @endif
                    </td>
                    <td style="text-align: center;">
                        <button class="btn-no-style" onclick="btnEditar({{$catalogo->id}},'catalogos')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </button>
                        @if ($catalogo->deleted_at == null)
                        <button class="btn-no-style" onclick="btnActivarBorrar({{$catalogo->id}},'catalogos',0)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                            </svg>
                        </button>
                        @else
                        <button class="btn-no-style" onclick="btnActivarBorrar({{$catalogo->id}},'catalogos',1)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                            </svg>
                        </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
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
@stop