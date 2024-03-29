@extends('adminlte::page')

@section('content')
@if(session('mensaje'))
    <div class="alert alert-success">
        {{session('mensaje')}}
    </div>
@endif
<div class="container-fluid" >
    <a href="{{ url('asistencia/create') }}" class="btn btn-success">Asistencia Empleados</a>
    <br><br>
    <div class="table-responsive">
        <table class="table table-striped table-dark">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">DNI df</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">A.Paterno</th>
                    <th class="text-center">A.Materno</th>
                    <th class="text-center">Asistencia</th>
                </tr>
            </thead>
            <tbody>
                   @foreach($asistencias as $asistencia)
                    <tr>
                        <td class="text-center">{{ $asistencia->empleado->dni }}</td>
                        <td class="text-center">{{ $asistencia->empleado->Nombre }}</td>
                        <td class="text-center">{{ $asistencia->empleado->ApellidoPaterno }}</td>
                        <td class="text-center">{{ $asistencia->empleado->ApellidoMaterno }}</td>
                        <td class="text-center">{{ $asistencia->fecha }}</td>
                    </tr>                       
                   @endforeach                            
            </tbody>
        </table>

    </div>
       
   
        </div>
    </div>

</div>
@stop