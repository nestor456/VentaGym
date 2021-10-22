        <h1>{{ $modo }} Empleado</h1>

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
            <label for="Nombre">Nombre</label>
            <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ isset($empleado->Nombre)?$empleado->Nombre:'' }}">
        </div>

        <div class="form-group">
            <label for="ApellidoPaterno">Apellido Paterno</label>
        <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" class="form-control" value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:'' }}">
        </div>

        <div class="form-group">
            <label for="ApellidoMaterno">Apellido Materno</label>
        <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" class="form-control" value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:'' }}">
        </div>

        <div class="form-group">
            <label for="dni">DNI</label>
        <input type="text" name="dni" id="dni" class="form-control" value="{{ isset($empleado->dni)?$empleado->dni:'' }}" step="8">
        </div>

        <div class="form-group">
            <label for="Telefono">Telefono</label>
        <input type="text" name="Telefono" id="Telefono" class="form-control" value="{{ isset($empleado->Telefono)?$empleado->Telefono:'' }}">
        </div>

        <div class="form-group">
            <label for="Correo">Correo</label>
        <input type="text" name="Correo" id="Correo" class="form-control" value="{{ isset($empleado->Correo)?$empleado->Correo:'' }}">
        </div>

        <div class="form-group">
            <label for="Domicilio">Domicilio</label>
        <input type="text" name="Domicilio" id="Domicilio" class="form-control" value="{{ isset($empleado->Domicilio)?$empleado->Domicilio:'' }}">
        </div>

        <div class="form-group">
            <label for="Area">Area</label>
                <select name="Area" id="Area" class="form-control">
                    @foreach($areas as $area )
                        <option value="{{ $area['Nombre'] }}">{{ $area['Nombre'] }}</option>
                    @endforeach
                    
                </select>
        </div>

        

        <input type="submit" value="{{ $modo }} Datos" class="btn btn-success">

        <a href="{{ url('empleado') }}" class="btn btn-primary">Regresar</a>