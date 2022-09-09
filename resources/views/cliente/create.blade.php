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
    <script src="/js/distrito/create.js"></script>
    <script>
        function seleccionado(){
            var opt = $('#tipo_cp').val();
            
            //alert(opt);
            if(opt=="Empresa"){
                $('#empresa').show();
            }
            if(opt=="Persona Natural"){
                $('#empresa').hide();
            }
        }
    </script>
@stop