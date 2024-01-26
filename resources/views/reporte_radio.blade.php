<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet"/>
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
</head>

<div class="container">
    <div class="card bg-secondary">
        <div class="card-body">
        <form class="col-sm-12" >
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Fecha</label>
                <div class="form-group row input-group date col-sm-10" id='datetimepicker'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Área</label>
                <div class="col-sm-10" style="height: 3rem">
                    <select class="form-select" aria-label="Default select example">
                        <option value="0" selected>Selecciona el área de servicio</option>
                        @foreach ($areas as $area)
                            <option value={{$area->id_area}}>{{$area->areas}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Unidad</label>
                <div class="col-sm-10" style="height: 3rem">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Selecciona la Unidad</option>
                        @foreach ($unidades as $unidad)
                            <option value={{$unidad->id_unidad}}>{{$unidad->unidades}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Incidente</label>
                <div class="col-sm-10" style="height: 3rem">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Selecciona el tipo de incidente</option>
                        @foreach ($incidentes as $incidente)
                            <option value={{$incidente->id_incidente}}>{{$incidente->incidentes}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Ubicacion</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" placeholder="Agregar ubicación">
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#datetimepicker').datetimepicker();
    });
</script>