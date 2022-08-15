@extends('adminlte::page')

@section('title', 'Editar categoria')

@section('content')
<br>
<main class="discussion-mp">
    <div class="main-section">
        <div class="container">
            <div class="col-lg-10 col-md-10">
                <form action="{{ url('/categories/'.$categories->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}

                     @if(count($errors)>0)
                     <div class="alert alert-danger" role="alert">
                         <ul>
                             @foreach($errors->all() as $error)
                                 <li> {{ $error }} </li>
                             @endforeach
                         </ul>                
                     </div>           
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                    <div class="card">
                        <div class="card-header">
                            Crear categorias
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><input class="form-control" type="text" name="name" placeholder="Nombre de categoría" value="{{ $categories->name}}"></th>                                        
                                        </tr>
                                        <tr>
                                            <th><textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Descripción">{{ $categories->description}}</textarea></th>              
                                        </tr>
                                    </thead>
                                </table>
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