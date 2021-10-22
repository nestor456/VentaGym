@extends('layouts.menu')

@section('content')

<div class="container">
    <h1>Crear nueva membresia</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/membresia')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('membresia.form',['modo'=>'Create'])
            </form>
        </div>
    </div>    
</div>
@endsection