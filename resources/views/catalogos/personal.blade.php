@extends('layout.app')

@section('content')
<div class="table-container">
    <h1 style="margin: 2rem; text-align: center;">PERSONAL</h1>
    <table id="personalTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th><th>Puesto</th><th>Turno</th><th>Estado</th><th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personal as $item)
                <tr>
                    <td>{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</td>
                    <td>{{$item->puesto}}</td>
                    <td>{{$item->turno}}</td>
                    <td>
                        @if ($item->deleted_at == null) Activo @else Inactivo @endif
                    </td>
                    <td>
                        <button class="btn-no-style" onclick="btnEditPersonal({{$item->id}},'{{$item->nombre}}','{{$item->apellido_m}}','{{$item->apellido_p}}',{{$item->id_tipo}},{{$item->id_turno}})" data-bs-toggle="modal" data-bs-target="#editarPersonal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </button>
                        @if ($item->deleted_at == null)
                        <button class="btn-no-style" onclick="btnActivarBorrar({{$item->id}},'personal',0)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                            </svg>
                        </button>
                        @else
                        <button class="btn-no-style" onclick="btnActivarBorrar({{$item->id}},'personal',1)">
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

<!-- Editar Personal -->
<div class="modal fade" id="editarPersonal" tabindex="-1" aria-labelledby="NuevoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="NuevoModalLabel">Editar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="text" class="form-control modal-input" id="nombre_edit" placeholder="Nombre">
            <input type="text" class="form-control modal-input" id="apellido_p_edit" placeholder="Apellido Paterno">
            <input type="text" class="form-control modal-input" id="apellido_m_edit" placeholder="Apellido Materno">
            <select class="form-select modal-input" id="id_puesto_edit">
                @foreach ($puesto as $item)
                    <option id="puesto-{{$item->id}}" value="{{$item->id}}">{{$item->descripcion}}</option>
                @endforeach
            </select>
            <select class="form-select modal-input" id="id_turno_edit">
                @foreach ($turno as $item)
                    <option id="turno-{{$item->id}}" value="{{$item->id}}">{{$item->descripcion}}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" id="btn-editarP" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
@include('scripts.scripts-catalogos')
@stop