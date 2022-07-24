@extends('layouts.menu')

@section('content')
@if(session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
@endif
<div class="container-fluid" >
<div class="card">
    <div class="card-body table-responsive">
        <a href="{{ url('cliente/create') }}" class="btn btn-success">Registrar nueva Cliente</a>
        <br><br>
        <form class="form-inline" action="{{ url('/cliente') }}" method="GET">
            <input class="form-control mr-sm-2" name="texto" value="{{$texto}}" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        <br>
        <table class="table table-striped table-dark" name="tabla-cliente" id="tabla-cliente" >
            <thead class="thead-light">
                <th class="text-center">Foto</th>
                <th class="text-center">Sede</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">A.Paterno</th>
                <th class="text-center">dni</th>
                <th class="text-center">Membresía</th>
                <th class="text-center">Entrenador</th>
                <th class="text-center">Congelar Membresia</th>              
                <th class="text-center">Dias Restantes</th>
                <th class="text-center" colspan="2">Acciones</th>
            </thead>
            <tbody>
                @foreach($details as $cliente)
                    
                    <tr>
                    <td class="text-center">
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$cliente['Foto'] }}" width="100" alt=""> 
                    </td>
                    <td class="text-center">{{ $cliente['gym'] }}</td>
                    <td class="text-center">{{ $cliente['Nombre'] }}</td>
                    <td class="text-center">{{ $cliente['ApellidoPaterno'] }}</td>
                    <td class="text-center">{{ $cliente['dni'] }}</td>
                    <td class="text-center">{{ $cliente['Membresia'] }}</td>
                    <td class="text-center">{{ $cliente['Entrenador'] }}</td>
                    <td class="text-center">{{ $cliente['congelar_membresia'] }}</td> 
                    <td class="text-center">{{ $cliente['rest'] }} dias</td>                         
                    <td width="50px">
                        <a href="{{ url('/cliente/'.$cliente['id'].'/edit') }}" class="btn btn-warning">
                            Editar
                        </a>
                    </td>
                    <td width="50px">
                        <form action="{{ url('/cliente/'.$cliente['id'] ) }}" class="d-inline" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar"> 
                        </form>
                    </td>                       
                    </tr>
                @endforeach                
            </tbody>
        </table>
        {!! $datos->links() !!}
    </div>
</div>
</div>
@endsection