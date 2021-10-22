@extends('layouts.menu')

@section('content')

<div class="container">
    <h1>Editar producto</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/producto/'.$producto->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                @include('producto.form',['modo'=>'Editar'])
            </form>
        </div>
    </div>    
</div>
@endsection