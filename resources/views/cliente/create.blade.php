@extends('adminlte::page')
@section('title', 'Crear Clientes')
@section('content')
<br>
<div class="container-fluid">
    <form action="{{ url('/cliente')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('cliente.form',['modo'=>'Crear'])
    </form>
    
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