@extends('layouts.menu')

@section('content')
<div class="container-fluid" >
    <h1>Editar usuario</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                @include('users.form')

                <div class="form-group">
                    <input type="submit" value="Editar usuario" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection