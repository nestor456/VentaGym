@extends('adminlte::page')

@section('content')

@if(session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
@endif
<div class="container-fluid" >
    
@if(Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif 
<div class="card">
    <div class="card-body">
        <a class="btn btn-success" href="{{route('users.create')}}">Nuevo usuario</a>
    </div>
</div>     
<div class="card">        
            <div class="card-body table-responsive">                
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Roles</th>
                            <th class="text-center" colspan="2">Accion</th>
                        </tr>
                    </thead>
                    <tbody>   
                        @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{$user->id}}</td>
                            <td class="text-center">{{$user->name}}</td>
                            <td class="text-center">{{$user->email}}</td>
                            <td>
                                @forelse($user->roles as $role)
                                <span class="badge badge-info">{{$role->name}}</span>
                                @empty
                                <span class="badge badge-danger">No roles</span>
                                @endforelse
                            </td>
                            <td width="50px"><a href="{{ url('/users/'.$user->id.'/edit') }}" class="btn btn-warning">
                                Editar
                            </a>
                        </td>
                        <td width="50px">
                            <form action="{{route('users.destroy',$user)}}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        </tr>
                        @endforeach           
                    </tbody>
                </table> 
                {!! $users->links() !!}       
            </div>  
       
        </div>

</div>
@stop