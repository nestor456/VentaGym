@extends('adminlte::page')
@section('title', 'Area')
@section('content')
@if(session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
@endif
<div class="container-fluid" >
<div class="card">
    <div class="card-body table-responsive">
        @can('admin.area.create')
            <a href="{{ url('area/create') }}" class="btn btn-success">Registrar nueva Area</a>
        @endcan        
        <br><br>
        <table class="table table-dark">
            <thead class="thead-light">
                <th>#</th>
                <th class="text-center">Nombre</th>
                <th class="text-center" colspan="2">Accion</th>
            </thead>
            <tbody>
                @foreach($areas as $area)                   
                <tr>
                    <td>{{ $area->id }}</td>
                    <td class="text-center">{{ $area->Nombre }}</td>
                    <td width="50px">
                        @can('admin.area.update')
                            <a href="{{ url('/area/'.$area->id.'/edit') }}" class="btn btn-warning">Editar</a>
                        @endcan                        
                    </td>
                     <td width="50px">
                        @can('admin.area.destroy')
                            <form action="{{ url('/area/'.$area->id ) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar"> 
                            </form>
                        @endcan                        
                     </td>                      
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

@stop