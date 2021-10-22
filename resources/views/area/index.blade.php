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
        <a href="{{ url('area/create') }}" class="btn btn-success">Resgitrar nueva Area</a>
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
                        <a href="{{ url('/area/'.$area->id.'/edit') }}" class="btn btn-warning">
                         Editar
                        </a>
                    </td>
                     <td width="50px">
                        <form action="{{ url('/area/'.$area->id ) }}" class="d-inline" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar"> 
                        </form>
                     </td>                      
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection