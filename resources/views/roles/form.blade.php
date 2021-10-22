<div class="form-group">
    <label name="name">Nombre</label>
    <input class="form-control" type="text" name="name" id="name" value="{{ isset($role->name)?$role->name:'' }}" placeholder="Ingrese el nombre del rol">
    @error('name')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>

<h2 class="h3">Listado de permisos</h2>
    @foreach($permissions as $permission)                        
            <label>
                <div class="form-group">
                    <input class="mr.1" type="checkbox" value="{{$permission->id}}" name="permission[]"/>
                    <label class="form-check-label" for="flexCheckDefault">{{$permission->description}}</label><br>    
                </div>                               
            </label>                       
    @endforeach   
 