@extends('layouts.menu')

@section('content')

<div class="container">
    @if(Session::has('mensaje'))
    {{ Session::get('mensaje') }}
    @endif 
    <form action="{{ url('/asistencia')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('asistencia.form',['modo'=>'Create'])
    </form>
</div>

@endsection
