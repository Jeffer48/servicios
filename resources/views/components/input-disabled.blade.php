<div class="row mb-{{$size}}">
    <label class="col-sm-4 input-label">{{$label}}</label>
    <div class="col-sm-8">
        <input type="{{$type}}" style="background-color: darkseagreen;" value="{{$value}}" readonly="true" name="{{$name}}" class="form-control" id="{{$id}}">
        <div class="invalid-feedback">
            {{$text}}
        </div>
    </div>
</div>