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
    <label for="Nombre">Nombre del membresia</label>
    <input type="text" name="NombreMembresia" id="NombreMembresia" class="form-control" value="{{ isset($membresia->NombreMembresia)?$membresia->NombreMembresia:'' }}">
</div>

<input type="submit" value="{{ $modo }} Datos" class="btn btn-success">

<a href="{{ url('membresia') }}" class="btn btn-primary">Regresar</a>