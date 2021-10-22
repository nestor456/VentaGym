@extends('layouts.menu')

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
            <div class="col-xl-12">
                <a href="{{ url('empleado/create') }}" class="btn btn-success">Resgitrar nuevo empleado</a>
        <br><br>
    
        <form class="form-inline" action="{{ url('/empleado') }}" method="GET">
            <input class="form-control mr-sm-2" name="texto" value="{{$texto}}" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-dark">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">DNI</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">A.Paterno</th>
                        <th class="text-center">A.Materno</th>
                        <th class="text-center">Area</th>
                        <th class="text-center" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empleados as $empleado )              
                    <tr>
                        <td class="text-center">{{ $empleado->dni }}</td>
                        <td class="text-center">{{ $empleado->Nombre }}</td>
                        <td class="text-center">{{ $empleado->ApellidoPaterno }}</td>
                        <td class="text-center">{{ $empleado->ApellidoMaterno }}</td>
                        <td class="text-center">{{ $empleado->Area }}</td>
                        <td width="50px">
                            <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
                                Editar
                             </a>
                        </td> 
                        <td width="50px">
                            <form action="{{ url('/empleado/'.$empleado->id ) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar"> 
                            </form>
                        </td> 
                         
                        
                    </tr>
                     @endforeach
                </tbody>
            </table>
            {!! $empleados->links() !!}
        </div>          
       
            </div>
        </div>   
    </div>   
</div>
@endsection