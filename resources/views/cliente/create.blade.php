@extends('layouts.menu')

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
@endsection