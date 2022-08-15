@extends('adminlte::page')

@section('title', 'Crear sub categorias')

@section('content')
<main class="discussion-mp">
    <div class="main-section">
        <div class="container">
            <div class="col-lg-10 col-md-10">
                <form action="{{ route('subcategories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
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
                                            <th>
                                                <select class="form-control" name="category_id" id="category_id">
                                                    <option value="" disabled selected>categorias</option>
                                                    @foreach($categories as $categorie )
                                                        <option value="{{ $categorie['id'] }}">{{ $categorie['name'] }}</option>
                                                    @endforeach                                                            
                                                </select>
                                            </th>                                            
                                        </tr>
                                        <tr>
                                            <th><input class="form-control" type="text" name="name" placeholder="Nombre de categoría"></th>                                        
                                        </tr>
                                        <tr>
                                            <th><textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Descripción"></textarea></th>              
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