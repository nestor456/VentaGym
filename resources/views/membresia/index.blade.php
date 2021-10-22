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
        <a href="{{ url('membresia/create') }}" class="btn btn-success">Resgitrar nueva Membresia</a>
        <table class="table table-dark">
            <thead class="thead-light">
                <th>#</th>
                <th class="text-center">Nombre</th>
                <th class="text-center" colspan="2">Accion</th>
            </thead>
            <tbody>
                @foreach($membresias as $membresia)                   
                <tr>
                    <td>{{ $membresia->id }}</td>
                    <td class="text-center">{{ $membresia->NombreMembresia }}</td>
                    <td width="50px">
                        <a href="{{ url('/membresia/'.$membresia->id.'/edit') }}" class="btn btn-warning">
                        Editar
                     </a>
                    </td>
                    <td width="50px">                       
                        <form action="{{ url('/membresia/'.$membresia->id ) }}" class="d-inline" method="post">
                            @csrf
                            {{ method_field('DELETE') }}                            
                            <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar">
                        </form>
                    </td>                                        
                </tr>
                 @endforeach
            </tbody>
        </table>
        {!! $membresias->links() !!}
    </div>
</div>
</div>

@endsection