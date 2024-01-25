<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<div class="container" style="height: 10rem;">
    <div class="card bg-light">
        <div class="card-body">
        <form class="col-sm-10" >
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-10" style="height: 3rem">
                    <input type="text" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10" style="height: 3rem">
                  <div class="input-group date" id="datepicker">
                    <input type="text" class="form-control" id="date"/>
                    <span class="input-group-append">
                      <span class="input-group-text bg-light d-block">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </span>
                  </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Área</label>
                <div class="col-sm-10" style="height: 3rem">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Selecciona el área de servicio</option>
                        <option value="1">Bomberos</option>
                        <option value="2">Paramédicos</option>
                        <option value="3">Inspección</option>
                        <option value="4">Administrativo</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Unidad</label>
                <div class="col-sm-10" style="height: 3rem">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Selecciona la Unidad</option>
                        <option value="1">PCM 01</option>
                        <option value="2">PCM 04</option>
                        <option value="3">PCM 06</option>
                        <option value="4">PCM 17</option>
                        <option value="5">PCM 21</option>
                        <option value="6">PCM 22</option>
                        <option value="7">PCM 23</option>
                        <option value="8">PCM 1077</option>
                        <option value="9">SUMICH 1370</option>
                        <option value="10">SUMICH 1614</option>
                        <option value="12">BMT 01</option>
                        <option value="13">BMT 02</option>
                        <option value="14">BMT 03</option>
                        <option value="15">BMT 04</option>
                        <option value="16">BMT 05</option>
                        <option value="17">BMT 06</option>
                        <option value="18">BMT 07</option>
                        <option value="19">BMT 08</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Incidente</label>
                <div class="col-sm-10" style="height: 3rem">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Selecciona el tipo de incidente</option>
                        <option value="1">Aborto o Amenaza de Aborto</option>
                        <option value="2">Accidente Vehicular</option>
                        <option value="3">Agresión Física sin Armas</option>
                        <option value="4">Aplastamiento</option>
                        <option value="5">Apoyo a bomberos </option>
                        <option value="6">Apoyo a Municipios</option>
                        <option value="7">Atropellado</option>
                        <option value="8">Caída</option>
                        <option value="9">Choque Vehicular</option>
                        <option value="10">Cobertura de Evento</option>
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