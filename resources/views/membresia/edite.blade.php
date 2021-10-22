@extends('layouts.menu')

@section('content')

<div class="container">
    <h1>Edita membresia</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/membresia/'.$membresia->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                @include('membresia.form',['modo'=>'Editar'])
            </form>
        </div>
    </div>    
</div>
@endsection