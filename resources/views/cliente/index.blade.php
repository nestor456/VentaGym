@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')
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
        @can('cliente.create')
        <div class="card-body">
            <a href="{{ url('cliente/create') }}" class="btn btn-success">Registrar nueva Cliente</a>
        </div>
        @endcan        
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Código</th>
                            <th>Fecha de Creacón</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo de Documento</th>
                            <th>N°</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Género</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Departamento</th>
                            <th>Provinvia</th>
                            <th>Distrito</th>
                            <th>Rason Social</th>
                            <th>Ruc</th>
                            <th>Rubro</th>
                            <th>Pagina web</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($clientes as $cliente)
                        <tr>
                            <th class="text-center">{{$cliente->id}}</th>
                            <th class="text-center">{{$cliente->nombre}}</th>
                            <th class="text-center">{{$cliente->apellido}}</th>
                            <th class="text-center">{{$cliente->tipo_doc}}</th>
                            <th class="text-center">{{$cliente->number_doc}}</th>
                            <th class="text-center">{{$cliente->fecha_naci}}</th>
                            <th class="text-center">{{$cliente->genero}}</th>
                            <th class="text-center">{{$cliente->correo}}</th>
                            <th class="text-center">{{$cliente->telefono}}</th>
                            <th class="text-center">{{$cliente->direccion}}</th>
                            <th class="text-center">{{$cliente->departamento}}</th>
                            <th class="text-center">{{$cliente->provincia}}</th>
                            <th class="text-center">{{$cliente->distrito}}</th>
                            <th class="text-center">{{$cliente->razon_social}}</th>
                            <th class="text-center">{{$cliente->ruc}}</th>
                            <th class="text-center">{{$cliente->rubro}}</th>
                            <th class="text-center">{{$cliente->pagina_web}}</th>
                            <th class="text-center">
                                @can('cliente.update')
                                    <a href="{{ url('/cliente/'.$cliente->id.'/edit') }}" class="btn btn-warning">Editar</a>
                                @endcan
                            </th>
                            <th class="text-center">
                                @can('cliente.destroy')
                                <form action="{{ url('/cliente/'.$cliente->id ) }}" class="d-inline" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar"> 
                                </form>
                                @endcan                                
                        </th>                                       
                        </tr>
                        @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $clientes->links() }}
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