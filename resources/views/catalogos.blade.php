@extends('layout.app')

@section('content')
<div class="table-container">
    <form action="{{route('catalogos')}}" method="get">
        <select class="form-select" name="id_grupo" onchange="this.form.submit()" aria-label="Default select example" id="grupos" style="width: 50%; margin-bottom: 2rem;">
            <option id="opt-0" value="0">Todos</option>
            @foreach ($grupos as $option)
                <option id="opt-{{$option->id}}" value={{$option->id}}>{{$option->grupo}}</option>
            @endforeach
        </select>
    </form>
    <table id="catalogo" class="table table-striped" style="width:100%">
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
                        @else Inacivo @endif
                    </td>
                    <td style="text-align: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    let grupos = document.getElementById("grupos");
    let opt = "opt-"+{{$opt}};
    //new DataTable('#catalogo');

    $(document).ready(function() {
        let optSel = document.getElementById(opt);
        optSel.selected = "true";

        $('#catalogo').DataTable({
            "language":{
                "lengthMenu": "_MENU_ filas por página",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "search": "Buscar"
            }
        });
    });
</script>
@stop