@if(count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>                
            </div>           
@endif

<div class="form-group">
    <label for="Nombre">Nombre del Area</label>
    <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ isset($area->Nombre)?$area->Nombre:'' }}">
</div>

<input type="submit" value="{{ $modo }} Datos" class="btn btn-success">

<a href="{{ url('area') }}" class="btn btn-primary">Regresar</a>