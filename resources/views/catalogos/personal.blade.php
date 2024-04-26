@extends('layout.app')

@section('content')
<div class="table-container">
    <h1 style="margin: 2rem; text-align: center;">PERSONAL</h1>
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col col-sm-9">
            <div class="row">
                <div class="col col-sm-6">
                    <select class="form-select" id="id_puesto" onchange="updateFiltersPersonal()" aria-label="Default select example">
                        <option value="0">Filtro de Puesto</option>
                        @foreach ($puesto as $item)
                            <option value={{$item->id}}>{{$item->descripcion}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col col-sm-6">
                    <select class="form-select" id="id_turno" onchange="updateFiltersPersonal()" aria-label="Default select example">
                        <option value="0">Filtro de Turno</option>
                        @foreach ($turno as $item)
                            <option value={{$item->id}}>{{$item->descripcion}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col col-sm-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#nuevoPersonal">Agregar Personal</button>
        </div>
    </div>
    <table id="tabla" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th><th>Puesto</th><th>Turno</th><th>Estado</th><th>Opciones</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Editar Personal -->
<div class="modal fade" id="editarPersonal" tabindex="-1" aria-labelledby="NuevoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="NuevoPersonalModal">Editar</h1>
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

<!-- Nuevo Personal -->
<div class="modal fade" id="nuevoPersonal" tabindex="-1" aria-labelledby="NuevoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="NuevoModalLabel">Agregar Personal</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="text" class="form-control modal-input" id="np_nombre" placeholder="Nombre/s">
            <input type="text" class="form-control modal-input" id="np_apellido_p" placeholder="Apellido Paterno">
            <input type="text" class="form-control modal-input" id="np_apellido_m" placeholder="Apellido Materno">
            <select class="form-select modal-input" id="np_puesto">
                <option value="" selected>Seleccione un puesto</option>
                @foreach ($puesto as $item)
                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                @endforeach
            </select>
            <select class="form-select modal-input" id="np_turno">
                <option value="" selected>Seleccione un turno</option>
                @foreach ($turno as $item)
                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" id="btn-guardarP" onclick="crearPersonal()" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
@include('scripts.scripts-catalogos')
@include('tablas.datatables')
<script>
    $(document).ready(function() {
        createDataTable("{{route('get-personal')}}");
    });
</script>
@stop