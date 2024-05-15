<div class="row mb-{{$size}}">
    <label class="col-sm-4 input-label">{{$label}}</label>
    <div class="col-sm-8">
        <select class="form-select" name="{{$name}}" aria-label="Default select example" id="{{$id}}" required>
            <option value="" selected>{{$text}}</option>
            @foreach ($options as $option)
                <option value={{$option->id}}>{{$option->descripcion}}</option>
            @endforeach
        </select>
        <div id="alert-{{$name}}" class="invalid-feedback">
            Seleccione alguna opción
        </div>
    </div>
</div>