@extends('layouts.menu')

@section('content')

<div class="container">
    <h1>Crear nueva area</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/area')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('area.form',['modo'=>'Create'])
            </form>
        </div>
    </div>    
</div>
@endsection