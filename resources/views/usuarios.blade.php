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
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#NuevoUsuario">Nuevo Usuario</button>
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

<!-- Modal de Usuario -->
<div class="modal" id="NuevoUsuario" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Usuario</h5>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-bottom: 3%;">
                    <div class="col col-sm-4" style="align-self: center; font-size: medium; font-weight: 500;">
                        Personal
                    </div>
                    <div class="col col-sm-8">
                        <select class="form-select" onchange="useExistentUser()" id="input-personal" aria-label="Default select example">
                            <option value="0">Agregar a alguien del personal</option>
                            @foreach ($personal as $item)
                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <x-input label="Nombre/s" name="nombre" type="text" text="No dejar campo vacío" id="input-nombre" size="3" placeh="Nombre"></x-input>
                <x-input label="Apellido Paterno" name="apellido_p" type="text" text="No dejar campo vacío" id="input-apellido-p" size="3" placeh="Apellido Paterno"></x-input>
                <x-input label="Apellido Materno" name="apellido_m" type="text" text="No dejar campo vacío" id="input-apellido-m" size="3" placeh="Apellido Materno"></x-input>
                <x-input label="Usuario" name="user" type="text" text="Agregar nombre de usuario" id="input-usuario" size="3" placeh="Nombre de usuario"></x-input>
                <div class="form-check">
                    <label class="form-check-label" for="flexCheckDefault" style="font-size: medium; font-weight: 500; margin-bottom: 3%;">
                        Agregar correo
                    </label>
                    <input class="form-check-input" onclick="useEmail()" type="checkbox" value="" id="usarCorreo" checked>
                </div>
                <x-input label="Email" name="email" type="email" text="No dejar campo vacío" id="input-email" size="3" placeh="correo@email.com"></x-input>
                <x-input label="Contraseña" name="password" type="password" text="Ingrese un correo valido" id="input-pass" size="3" placeh="Contraseña"></x-input>
                <div class="row">
                    <div class="col col-sm-6" style="align-self: center; font-size: medium; font-weight: 500;">
                        Seleccionar el Rol del Usuario
                    </div>
                    <div class="col col-sm-6">
                        <select class="form-select" id="nu_id_tipo" aria-label="Default select example">
                            <option value="0">Seleccionar Rol</option>
                            @foreach ($tipo as $option)
                                <option value={{$option->id}}>{{$option->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="newUser()" class="btn btn-primary">Crear nuevo</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@include('scripts.scripts-usuarios')
@include('tablas.datatables')
<script>
    $(document).ready(function() {
        createDataTable("{{route('get-usuarios')}}");
    });
</script>
@stop