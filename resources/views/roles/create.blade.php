@extends('adminlte::page')

@section('content')
<br>
<main class="discussion-mp">
    <div class="main-section">
        <div class="container">
            <div class="col-lg-10 col-md-10">
                <form action="{{route('admin.roles.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            Permisos
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="name">Nombre del permiso</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" autofocus>
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
                                                        @foreach($permissions as $permission)
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$permission->id}}" id="defaultCheck1">
                                                                    <label class="form-check-label" for="defaultCheck1">
                                                                        {{$permission->name}}
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
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                      </div>                
                </form>
            </div>
        </div>
    </div>
</main>
@stop