@extends('layouts.menu')

@section('content')

@if(session('mensaje'))
    <div class="alert alert-success">
        {{session('mensaje')}}
    </div>
@endif

<div class="container">
    <form action="{{ url('/asistencia')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('asistencia.form',['modo'=>'Create'])
    </form>
</div>

@endsection
