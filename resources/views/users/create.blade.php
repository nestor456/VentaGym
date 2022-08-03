@extends('adminlte::page')

@section('content')
<div class="container-fluid" >
    <h1>Crear nuevo usuario</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                @csrf
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
                <div class="row">
                    <label for="name" class="col-sm-2 col-form-label">Roles</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <table class="table">
                                        <tbody>
                                            @foreach($roles as $id => $role)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="roles[]" value="{{$id}}" id="defaultCheck1">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            {{$role}}
                                                        </label>
                                                      </div>
                                                </td>
                                            </tr>
                                            @endforeach                                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                
                <div class="form-group">
                    <input type="submit" value="Crear usuario" class="btn btn-success">
                </div>             
            </form>
        </div>
    </div>
</div>
@stop