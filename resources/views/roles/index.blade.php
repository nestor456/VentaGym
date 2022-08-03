@extends('adminlte::page')

@section('content')
@if(session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
@endif
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="{{ route('roles.create') }}" class="btn btn-success">Registrar nueva Role</a>
        </div>
    </div>
        <div class="card">
            <div class="card-body">
                <div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">ID</th>
                                    <th scope="col" class="text-center">Nombre</th>
                                    <th scope="col" class="text-center">Fecha de creación</th>
                                    <th scope="col" class="text-center">Permisos</th>
                                    <th colspan="2" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($roles as $role)                            
                                <tr>
                                    <td scope="row" class="text-center"><a href="{{ url('/roles/'.$role->id) }}">{{$role->id}} </a></td>
                                    <td scope="row" class="text-center">{{$role->name}}</th>
                                    <td scope="row" class="text-center">{{ $role->created_at->toFormattedDateString() }}</td>
                                    <td scope="row" class="text-center">
                                        @forelse($role->permissions as $permissions)
                                            <span class="badge badge-info">{{$permissions->name}}</span>
                                        @empty
                                        <span class="badge badge-danger">No permission added</span>
                                        @endforelse
                                    </td>
                                    <td scope="row" class="text-center">
                                        <a href="{{ url('/roles/'.$role->id.'/edit') }}" class="btn btn-warning">Editar</a>                                         <form action="{{ url('/roles/'.$role->id ) }}" class="d-inline" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar"> 
                                        </form>
                                    </td>                                 
                                </tr>
                                @empty
                                No hay roles
                            @endforelse 
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>            
        </div>
        {{ $roles->links() }}
</div>
@stop