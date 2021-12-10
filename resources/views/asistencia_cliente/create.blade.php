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
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext"  value="{{$clientes->Nombre." ".$clientes->ApellidoPaterno." ".$clientes->ApellidoMaterno}}">
                      <input type="text" readonly class="form-control-plaintext" name="id" value="{{$clientes->id}}" hidden>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Dni</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext"  value="{{$clientes->dni}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Membresia</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext"  value="{{$clientes->Membresia}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Final</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext"  value="{{$clientes->Fecha_Final}}">
                    </div>
                </div>
                <input type="submit" value="Aceptar" class="btn btn-success">
            </form>
        </div>
    </div>  
    @endif
    
</div>

@endsection
