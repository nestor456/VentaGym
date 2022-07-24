@extends('layouts.menu')

@section('content')

<div class="container-fluid">
    <h1>Editar Cliente</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/cliente/'.$cliente->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                @if(count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>                
            </div>           
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif

<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ isset($cliente->Nombre)?$cliente->Nombre:'' }}">
</div>
<div class="form-group">
    <label for="ApellidoPaterno">ApellidoPaterno</label>
    <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" class="form-control" value="{{ isset($cliente->ApellidoPaterno)?$cliente->ApellidoPaterno:'' }}">
</div>
<div class="form-group">
    <label for="ApellidoMaterno">ApellidoMaterno</label>
    <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" class="form-control" value="{{ isset($cliente->ApellidoMaterno)?$cliente->ApellidoMaterno:'' }}">
</div>
<div class="form-group">
    <label for="dni">dni</label>
    <input type="text" name="dni" id="dni" class="form-control" value="{{ isset($cliente->dni)?$cliente->dni:'' }}">
</div>
<div class="form-group">
    <label for="Telefono">Telefono</label>
    <input type="text" name="Telefono" id="Telefono" class="form-control" value="{{ isset($cliente->Telefono)?$cliente->Telefono:'' }}">
</div>
<div class="form-group">
    <label for="Correo">Correo</label>
    <input type="text" name="Correo" id="Correo" class="form-control" value="{{ isset($cliente->Correo)?$cliente->Correo:'' }}">
</div>
<div class="form-group">
    <label for="Entrenador">Sede</label>
    <select name="gym" id="gym" class="form-control">
        <option value="TemploGym" selected>TemploGym</option>
        <option value="UltraTech">UltraTech</option> 
    </select>
</div>
<div class="form-group">
    <label for="Membresia">Membresía</label>
    <select name="Membresia" id="Membresia" class="form-control">
        <option value="{{ $cliente->Membresia }}" selected hidden>{{ $cliente->Membresia }}</option>
        @foreach($menbresias as $menbresia )
            <option value="{{ $menbresia['NombreMembresia'] }}">{{ $menbresia['NombreMembresia'] }}</option>
        @endforeach        
    </select>
</div>
<div class="form-group">
    <label for="Entrenador">Entrenador</label>
    <select name="Entrenador" id="Entrenador" class="form-control">
        <option value="{{ $cliente->Entrenador }}" selected hidden>{{ $cliente->Entrenador }}</option>
        @foreach($empleados as $empleado )
            <option value="{{ $empleado['Nombre'] }}">{{ $empleado['Nombre'] }}</option>
        @endforeach        
    </select>
</div>
<div class="form-group">
    <label for="Nombre">Objetivo fisico</label>
        <textarea class="form-control" name="Objetivo_fisico" id="Objetivo_fisico" class="form-control">{{ isset($cliente->Objetivo_fisico)?$cliente->Objetivo_fisico:'' }}</textarea>
</div>
<div class="form-group">
    <label for="Foto">Foto</label><br>
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$cliente->Foto }}" width="100" alt="">      
    <input type="file" class="form-control-file" name="Foto" id="Foto" value="{{$cliente->Foto}}">
</div>
<div class="form-group">
    <label for="Entrenador">Congelar Membresia</label>
    <select name="congelar_membresia" id="congelar_membresia" class="form-control" onchange="seleccionado()">
        <option value="{{$cliente->congelar_membresia}}" selected hidden>{{$cliente->congelar_membresia}}</option>
        <option value="Activar">Activar</option>
        <option value="Desactivar">Desactivar</option> 
    </select>
</div>
<div class="credito" id="credito">
    <label for="Nombre">Observación</label>
        <textarea class="form-control" name="observacion" id="observacion" class="form-control">{{ isset($cliente->observacion)?$cliente->observacion:'' }}</textarea>
</div>

<div class="form-group">
    <label for="Fecha_Inicio">Fecha_Inicio</label>
    <input type="date" name="Fecha_Inicio" id="Fecha_Inicio" class="form-control" value="{{ isset($cliente->Fecha_Inicio)?$cliente->Fecha_Inicio:'' }}">
</div>
<div class="form-group">
    <label for="Fecha_Final">Fecha_Final</label>
    <input type="date" name="Fecha_Final" id="Fecha_Final" class="form-control" value="{{ isset($cliente->Fecha_Final)?$cliente->Fecha_Final:'' }}">
</div>
<div class="form-group">
    <label for="Correo">Observación de Deuda</label>
    <input type="text" name="deuda" id="deuda" class="form-control" value="{{ isset($cliente->deuda)?$cliente->deuda:'' }}">
</div>

<input type="submit" value="Editar Datos" class="btn btn-success">

<a href="{{ url('cliente') }}" class="btn btn-primary">Regresar</a>
            </form>
        </div>
    </div>    
</div>
@endsection
<script>
    function seleccionado(){
        var opt = $('#congelar_membresia').val();
        
        //alert(opt);
        if(opt=="Activar"){
            $('#credito').show();
        }
        if(opt=="Desactivar"){
            $('#credito').hide();
        }
    }
</script>