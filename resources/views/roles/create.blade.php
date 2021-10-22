@extends('layouts.menu')

@section('content')
<div class="container-fluid" >
    <h1>Creal nuevo rol</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.roles.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('roles.form')
                
                <div class="form-group">
                    <input type="submit" value="Crear Rol" class="btn btn-success">
                </div>             
            </form>
        </div>
    </div>
</div>
@endsection