<div class="row mb-{{$size}}">
    <label class="col-sm-3 input-label">{{$label}}</label>
    <div class="col-sm-9">
        <input type="{{$type}}" name="{{$name}}" class="form-control" id="{{$id}}" required>
        <div class="invalid-feedback">
            {{$text}}
        </div>
    </div>
</div>