@extends('adminlte::page')

@section('content')
<main class="discussion-mp">
    <div class="main-section">
        <div class="container">
            <div class="col-lg-10 col-md-10">
                <form action="{{ route('roles.update', $role) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="card">
                        <div class="card-header">
                            Permisos
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="name">Nombre del permiso</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" autofocus value="{{ $role->name }}">
                                </div>
                            </div><br>
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Permiso</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <table class="table">
                                                    <tbody>
                                                        @foreach($permissions as $id => $permission)
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="permissions[]" 
                                                                    value="{{$id}}" {{ $role->permissions->contains($id) ? 'checked' : ''}} id="defaultCheck1">
                                                                    <label class="form-check-label" for="defaultCheck1">
                                                                        {{$permission}}
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach                                                            
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                      </div> 
                </form>
            </div>
        </div>
    </div>
</main>
@stop