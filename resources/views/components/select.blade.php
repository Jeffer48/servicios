<div class="row mb-3">
    <label class="col-sm-3 input-label">{{$label}}</label>
    <div class="col-sm-9">
        <select class="form-select" aria-label="Default select example" id="input_area" required>
            <option value="" disabled selected>Seleccione un área</option>
            @foreach ($options as $option)
                <option value={{$option->id}}>{{$option->descripcion}}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Seleccione alguna opción
        </div>
    </div>
</div>