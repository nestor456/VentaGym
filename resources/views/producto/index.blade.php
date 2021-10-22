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

        @can('admin.producto.create')
        <a href="{{ url('producto/create') }}" class="btn btn-success">Resgitrar nueva Producto</a> 
        @endcan

        <br><br>
        <table class="table table-dark">
            <thead class="thead-light">
                <th class="text-center">Nombre Producto</th>
                <th class="text-center">Detalle</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Precio</th>
                <th class="text-center" colspan="2">Accion</th>
            </thead>
            <tbody>
                @foreach($productos as $producto)                   
                <tr>
                    <td class="text-center">{{ $producto->NombreProducto }}</td>
                    <td class="text-center">{{ $producto->Detalle }}</td>
                    <td class="text-center">{{ $producto->stock }}</td>
                    <td class="text-center">{{ $producto->precio }}</td>

                    <td width="50px">
                        @can('admin.producto.update')
                        <a href="{{ url('/producto/'.$producto->id.'/edit') }}" class="btn btn-warning">
                            Editar
                         </a> 
                        @endcan
                    </td> 
                    <td width="50px">
                        <form action="{{ url('/producto/'.$producto->id ) }}" class="d-inline" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            @can('admin.producto.destroy')
                            <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar"> 
                            @endcan
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