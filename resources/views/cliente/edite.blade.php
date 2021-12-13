@extends('layouts.menu')

@section('content')

<div class="container-fluid">
    <h1>Editar Cliente</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/cliente/'.$cliente->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                @include('cliente.form',['modo'=>'Editar'])
            </form>
        </div>
    </div>    
</div>
@endsection
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