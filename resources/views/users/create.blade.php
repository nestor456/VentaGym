@extends('layouts.menu')

@section('content')
<div class="container-fluid" >
    <h1>Crear nuevo usuario</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('users.form')
                
                <div class="form-group">
                    <input type="submit" value="Crear usuario" class="btn btn-success">
                </div>             
            </form>
        </div>
    </div>
</div>
@endsection