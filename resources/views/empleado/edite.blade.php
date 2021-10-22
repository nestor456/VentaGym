@extends('layouts.menu')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/empleado/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
                @csrf
        
                {{method_field('PATCH')}}
        
                @include('empleado.form',['modo'=>'Editar'])
            </form>
        </div>
    </div>    
</div>
@endsection