@extends('adminlte::page')
@section('title', 'Crear Empleados')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/empleado')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('empleado.form',['modo'=>'Crear'])
            </form>
        </div>
    </div>
</div>
@stop