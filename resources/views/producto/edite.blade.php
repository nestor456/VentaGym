@extends('adminlte::page')

@section('content')

<div class="container">
    <h1>Editar producto</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/producto/'.$producto->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                <main class="discussion-mp">
                    <div class="main-section">
                        <div class="container">
                            <div class="col-lg-10 col-md-10">
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
                                                                <input type="text" name="NombreProducto" id="NombreProducto" class="form-control" placeholder="Nombre de Producto" value="{{ $producto->NombreProducto}}">
                                                            </th>
                                                            <th>
                                                                <select class="form-control" name="idcategoria" id="idcategoria">
                                                                    <option value="" disabled selected>Categorias</option>
                                                                    @foreach($categories as $categorie)
                                                                        <option value="{{ $categorie->id}}">{{$categorie->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </th>
                                                            <th>
                                                                <select class="form-control" name="idsubcategoria" id="idsubcategoria">
                                                                    
                                                                </select>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th><input class="form-control" type="text" placeholder="Cod.Proveedor" name="idproveedor3" id="idproveedor3" disabled></th>
                                                            <th>
                                                                <select class="form-control" name="idproveedor2" id="idproveedor2">
                                                                    <option value="" disabled selected>Nombre de Porveedor</option>
                                                                    @foreach($provides as $provide)
                                                                        <option value="{{ $provide->id}}_{{ $provide->ruc}}">{{$provide->razon_social}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <input type="text" name="idproveedor" id="idproveedor" hidden>
                                                            </th>
                                                            <th><input class="form-control" type="text" placeholder="RUC" name="ruc" id="ruc" disabled></th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="3">
                                                                <textarea class="form-control" name="Detalle" id="Detalle" class="form-control" placeholder="Descripción">{{$producto->Detalle}}</textarea></th>
                                                        </tr>
                                                        <tr>
                                                            <th><input type="integer" name="stock" id="stock" class="form-control" placeholder="Stock" value="{{ $producto->stock }}"></th>
                                                            <th><input type="integer" name="precio" id="precio" class="form-control" placeholder="Precio" value="{{ $producto->precio }}"></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>                         
                                        <div class="card-footer ml-auto mr-auto">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                      </div>               
                            </div>
                        </div>
                    </div>
                </main>
            </form>
        </div>
    </div>    
</div>
@stop

@section('js')
    <script type="text/javascript"> 
        $("#idproveedor2").change(mostrarruc); 

        function mostrarruc() {
            datosProveedor = document.getElementById('idproveedor2').value.split('_');       
            $("#ruc").val(datosProveedor[1]);
            $("#idproveedor").val(datosProveedor[0]);
            $("#idproveedor3").val(datosProveedor[0]);
        } 

        $(document).ready(function(){
            $("#idcategoria").change(function(){
              var id = $(this).val();
              $.get('subCategory/'+ id, function(datas){ 
                console.log(datas);
                $('#idsubcategoria').empty();
                $('#idsubcategoria').append("<option value='0' disabled selected>Sub Categorias</option>")
                $.each(datas, function(id, value){
                    console.log(value.id);
                    $('#idsubcategoria').append("<option value='" + value.id + "'>"+ value.name +"</option>")
                });      
              });
            });
          })
    </script>
@stop