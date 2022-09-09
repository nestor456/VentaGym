@extends('adminlte::page')

@section('title', 'Editar Clientes')

@section('content')
<br>
<main class="discussion-mp">
  <div class="main-section">
      <div class="container">
          <div class="row justify-content-md-center">
              <div class="col-lg-10 col-md-10">
                <div>
                    <form action="{{ url('/cliente/'.$cliente->id) }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     {{method_field('PATCH')}}
                      <div class="card">
                      <h5 class="card-header">Registro de Clientes</h5>
                      <div class="card-body">
                                <div class="card">
                                  <div class="card-body">                                      
                                    <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th>
                                            <select class="form-control" aria-label="Default select example" name="tipo_cp" id="tipo_cp" onchange="seleccionado()">
                                              <option value="Persona Natural" selected>Persona Natural</option>
                                              <option value="Empresa">Empresa</option>
                                            </select>
                                          </th>
                                          <th scope="col"><input type="date" class="form-control" name="fecha" value="{{ isset($cliente->fecha)?$cliente->fecha:'' }}"></th> 
                                        </tr>
                                      </thead>
                                    </table>
                                  </div>   
                                </div>
                              
                                <div class="card">
                                  <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th colspan="2"><input type="text" class="form-control" name="nombre" value="{{ isset($cliente->nombre)?$cliente->nombre:'' }}" placeholder="Nombres"></th>
                                            <th colspan="2"><input type="text" class="form-control" name="apellido" value="{{ isset($cliente->apellido)?$cliente->apellido:'' }}" placeholder="Apellidos"></th>
                                          </tr>
                                          <tr>
                                              <th>
                                                <select class="form-control" aria-label="Default select example" value="{{ isset($cliente->tipo_doc)?$cliente->tipo_doc:'' }}" name="tipo_doc">
                                                <option selected>Tipo de Documento</option>
                                                <option value="1">Dni</option>
                                                <option value="2">Ruc</option>
                                                <option value="3">CE</option>
                                              </select>
                                            </th>
                                              <th>
                                                <input type="number" class="form-control" name="number_doc" value="{{ isset($cliente->number_doc)?$cliente->number_doc:'' }}" placeholder="N°">
                                              </th>
                                              <th>
                                                <input type="date" class="form-control" name="fecha_naci" value="{{ isset($cliente->fecha_naci)?$cliente->fecha_naci:'' }}">
                                              </th>
                                              <th>
                                                <select class="form-control" aria-label="Default select example" name="genero">
                                                <option selected>Género</option>
                                                <option value="1">Masculino</option>
                                                <option value="2">Femenino</option>
                                                <option value="3">Otros</option>
                                              </select>
                                            </th>
                                          </tr>
                                          <tr>
                                            <th>
                                              <input type="text" class="form-control" name="categoria1" value="{{ isset($cliente->categoria1)?$cliente->categoria1:'' }}" placeholder="Categoria">
                                            </th>
                                            <th>
                                              <input type="text" class="form-control" name="telefono" value="{{ isset($cliente->telefono)?$cliente->telefono:'' }}"placeholder="Número de Teléfono">
                                            </th>
                                            <th colspan="2">
                                             <input type="email" class="form-control" name="correo" value="{{ isset($cliente->correo)?$cliente->correo:'' }}" placeholder="Correo Electrónico">
                                            </th>
                                          </tr>
                                        </thead>
                                    </table>
                                  </div>
                                </div>
                              
                                <div class="card" style="display:none;" id="empresa">
                                  <div class="card-body">
                                    <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th colspan="2">
                                            <input type="text" class="form-control" name="razon_social" value="{{ isset($cliente->razon_social)?$cliente->razon_social:'' }}" placeholder="Razón Social">
                                            </th>
                                          <th>
                                            <input type="text" class="form-control" name="ruc" value="{{ isset($cliente->ruc)?$cliente->ruc:'' }}" placeholder="RUC">
                                            </th>
                                        </tr>
                                        <tr>
                                          <th><input type="text" class="form-control" name="rubro" value="{{ isset($cliente->rubro)?$cliente->rubro:'' }}" placeholder="Rubro"></th>
                                          <th><input type="text" class="form-control" name="categoria2" value="{{ isset($cliente->categoria2)?$cliente->categoria2:'' }}" placeholder="Categoria"></th>
                                          <th><input type="text" class="form-control" name="pagina_web" value="{{ isset($cliente->pagina_web)?$cliente->pagina_web:'' }}" placeholder="Página web"></th>
                                        </tr>
                                      </thead>
                                    </table>
                                  </div>
                                </div>
                              
                                <div class="card">
                                  <div class="card-body">
                                    <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th colspan="3"><input type="text" class="form-control" name="direccion" value="{{ isset($cliente->number_doc)?$cliente->number_doc:'' }}" placeholder="Dirección"></th>
                                        </tr>
                                        <tr> 
                                          <th>
                                              <div class="col-md-15">
                                                  <select class="form-control" name="departamento" id="iddepartamento">
                                                    <option value="{{$departament->id}}" disabled selected>{{$departament->name}}</option>
                                                      @foreach($departamentos as $departamento)
                                                          <option value="{{ $departamento->id}}">{{$departamento->name}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                              </th>
                                          <th>
                                              <div class="col-md-15">
                                                  <select class="form-control" name="provincia" id="idprovincia">
                                                      <option value="{{$provicia->id}}" disabled selected>{{$provicia->name}}</option>
                                                  </select>
                                              </div>                                                
                                          </th>
                                          <th>
                                              <div class="col-md-15">
                                                  <select class="form-control" name="distrito" id="iddistrito">
                                                    <option value="{{$distrito->id}}" disabled selected>{{$distrito->name}}</option>
                                                  </select>
                                              </div>                                                
                                          </th>
                                        </tr>
                                      </thead>
                                    </table>
                                  </div>
                                </div>
                              
                                <div class="card">
                                  <div class="card-body">
                                    <table class="table table-bordered">
                                      <thead>
                                        <tr align="center">
                                          <th><button type="submit" class="btn btn-info">GUARDAR</button></th>
                                          <th><a href="/cliente" class="btn btn-secondary">VOLVER</a></th>
                                        </tr>
                                      </thead>
                                    </table>
                                  </div>
                                </div> 
                </div>
              </div>
                    </form>
                  </div>                                                  
              </div>
          </div>
      </div>
  </div>
</main>
@endsection
@section('js')
    <script src="/js/distrito/create.js"></script>
    <script>
        function seleccionado(){
            var opt = $('#tipo_cp').val();
            
            //alert(opt);
            if(opt=="Empresa"){
                $('#empresa').show();
            }
            if(opt=="Persona Natural"){
                $('#empresa').hide();
            }
        }
    </script>
@stop