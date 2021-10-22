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
    <label name="name">Nombre</label>
    <input class="form-control" type="text" name="name" id="name" value="{{ isset($user->name)?$user->name:'' }}" placeholder="Ingrese el nombre">
</div>

<div class="form-group">
    <label name="email">Email</label>
    <input class="form-control" type="text" name="email" id="email" value="{{ isset($user->email)?$user->email:'' }}" placeholder="Ingrese correo">
</div>

<div class="form-group">
    <label name="name">Password</label>
    <input class="form-control" type="password" name="password" id="password" value="{{ isset($user->password)?$user->password:'' }}" placeholder="Ingrese Password">
</div>

<h2 class="h5">Listado de roles</h2>

    @foreach($roles as $role)

        <div>
                <input 
                  class="mr.1"
                  type="checkbox"
                  value="{{$role->id}}"
                  name="roles[]"
                    />
                <label class="form-check-label" for="flexCheckDefault">
                  {{$role->name}}
                </label>
         </div>
    @endforeach