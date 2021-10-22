@extends('layouts.menu')

@section('content')

<div class="container">
    <h1>Editar area</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/area/'.$area->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                @include('area.form',['modo'=>'Editar'])
            </form>
        </div>
    </div>
</div>
@endsection