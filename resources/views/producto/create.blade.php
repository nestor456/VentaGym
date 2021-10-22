@extends('layouts.menu')

@section('content')
<div class="container">
    <h1>Crear nuevo producto</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/producto')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('producto.form',['modo'=>'Create'])
            </form>
        </div>
    </div>   
</div>
@endsection