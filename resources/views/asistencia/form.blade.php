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
    <label for="Nombre">Ingresar DNI</label>
    <input type="text" name="dni" id="dni" class="form-control" >
</div>

<input type="submit" value="{{ $modo }} Datos" class="btn btn-success">