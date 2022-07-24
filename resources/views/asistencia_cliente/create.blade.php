@extends('layouts.menu')

@section('content')

@if(session('mensaje'))
    <div class="alert alert-success">
        {{session('mensaje')}}
    </div>
@endif

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('asistencia_cliente/create')}}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="Nombre">Ingresar DNI</label>
                    <input type="text" name="dni" id="dni" class="form-control" >
                </div>
        
                <input type="submit" value="Ingresar" class="btn btn-success">
        
            </form>
        </div>
    </div>  
    <br>
    @if($clientes)
    <div class="card">
        <h5 class="card-header">Cliente</h5>
        <div class="card-body">
            <form action="{{ url('asistencia_cliente') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <th>Nombre</th>
                            <th>Dni</th>
                            <th>Sede</th>
                            <th>Membresia</th>
                            <th>Fecha Final</th>
                            <th>Congelar Membresia</th>
                            <th>Observación de Deuda</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$clientes->Nombre." ".$clientes->ApellidoPaterno." ".$clientes->ApellidoMaterno}}
                                    <input type="text" readonly class="form-control-plaintext" name="id" value="{{$clientes->id}}" hidden>
                                </td>
                                <td>{{$clientes->dni}}</td>
                                <td>{{$clientes->gym}}</td>
                                <td>{{$clientes->Membresia}}</td>
                                <td>{{$clientes->Fecha_Final}}</td>
                                <td>{{$clientes->congelar_membresia}}</td>
                                <td>{{$clientes->deuda}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <input type="submit" value="Aceptar" class="btn btn-success">
            </form>
        </div>
    </div>  
    @endif
    
</div>

@endsection
