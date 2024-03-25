<div class="row mb-{{$size}}">
    <label class="col-sm-4 input-label">{{$label}}</label>
    <div class="col-sm-8">
        <input type="{{$type}}" name="{{$name}}" class="form-control" id="{{$id}}" placeholder="{{$placeh}}" required>
        <div class="invalid-feedback">
            {{$text}}
        </div>
    </div>
</div>