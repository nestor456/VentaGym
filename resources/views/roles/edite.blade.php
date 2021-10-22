@extends('layouts.menu')

@section('content')
<div class="container-fluid" >
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.roles.update', $role) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                @include('roles.form')

                <div class="form-group">
                    <input type="submit" value="Editar Rol" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection