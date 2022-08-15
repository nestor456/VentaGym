@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')
<br>
@if(session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
@endif
@if(session('danger'))
    <div class="alert alert-danger">
        {{session('danger')}}
    </div>
@endif
<div class="container-fluid">
    <div class="card">
        
        <div class="card-body">
            <a href="{{ url('provides/create') }}" class="btn btn-success">Registrar nueva Cliente</a>
        </div>
                
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">Código</th>
                            <th class="text-center">Fecha de Creacón</th>
                            <th class="text-center">Razón Social</th>
                            <th class="text-center">RUC</th>
                            <th class="text-center">Rubro</th>
                            <th class="text-center">Página web</th>
                            <th colspan="2" class="text-center">Acciones</th>                            
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($provides as $provide)
                        <tr>
                            <th class="text-center">{{$provide->id}}</th>
                            <th class="text-center">{{$provide->fecha_creacion}}</th>
                            <th class="text-center">{{$provide->razon_social}}</th>
                            <th class="text-center">{{$provide->ruc}}</th>
                            <th class="text-center">{{$provide->rubro}}</th>
                            <th class="text-center">{{$provide->pagina_web}}</th>                            
                            <th class="text-center">
                                
                                    <a href="{{ url('/provides/'.$provide->id.'/edit') }}" class="btn btn-warning">Editar</a>||
                                    <form action="{{ url('/provides/'.$provide->id ) }}" class="d-inline" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar"> 
                                    </form>
                                
                            </th>                                 
                        </th>                                       
                        </tr>
                        @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $provides->links() }}
        </div>
</div>

@endsection
@section('js')
    <script>
        $('#myTab').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
          })
    </script>
@stop