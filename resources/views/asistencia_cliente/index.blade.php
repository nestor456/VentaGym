@extends('layouts.menu')

@section('content')
<div class="container-fluid" >
    <a href="{{ url('asistencia_cliente/create') }}" class="btn btn-success">Asistencia Cliente</a>
    <br><br>
    <div class="table-responsive">
        <table class="table table-striped table-dark">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">DNI</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">A.Paterno</th>
                    <th class="text-center">A.Materno</th>
                    <th class="text-center">Asistencia</th>
                </tr>
            </thead>
            <tbody>
                   @foreach($asistencias as $asistencia)
                    <tr>
                        <td class="text-center">{{ $asistencia->cliente->dni }}</td>
                        <td class="text-center">{{ $asistencia->cliente->Nombre }}</td>
                        <td class="text-center">{{ $asistencia->cliente->ApellidoPaterno }}</td>
                        <td class="text-center">{{ $asistencia->cliente->ApellidoMaterno }}</td>
                        <td class="text-center">{{ $asistencia->fecha }}</td>
                    </tr>                       
                   @endforeach                            
            </tbody>
        </table>

    </div>
       
   
        </div>
    </div>

</div>
@endsection