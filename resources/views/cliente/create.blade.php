@extends('adminlte::page')
@section('title', 'Crear Clientes')
@section('content')

<div class="container-fluid">
    <h1>Crear nuevo Cliente</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/cliente')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('cliente.form',['modo'=>'Crear'])
            </form>
        </div>
    </div>
    
</div>
@stop
@section('js')
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
@stop