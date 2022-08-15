@extends('adminlte::page')

@section('title', 'Sub categorias')

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
            <a href="{{ url('subcategories/create') }}" class="btn btn-success">Registrar nueva Sub Categoria</a>
        </div>
                
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">Código</th>
                            <th class="text-center">Categoria</th>
                            <th class="text-center">Fecha de Creacón</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Descripcion</th>
                            <th colspan="2" class="text-center">Acciones</th>                            
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategories as $subcategorie)
                        <tr>
                            <th class="text-center">{{$subcategorie->id}}</th>
                            <th class="text-center">{{$subcategorie->category_id}}</th>
                            <th class="text-center">{{$subcategorie->fecha_creacion}}</th>
                            <th class="text-center">{{$subcategorie->name}}</th> 
                            <th class="text-center">{{$subcategorie->description}}</th>                    
                            <th class="text-center">                                
                                    <a href="{{ url('/subcategories/'.$subcategorie->id.'/edit') }}" class="btn btn-warning">Editar</a>||
                                    <form action="{{ url('/subcategories/'.$subcategorie->id ) }}" class="d-inline" method="post">
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
            {{ $subcategories->links() }}
        </div>
</div>
@stop