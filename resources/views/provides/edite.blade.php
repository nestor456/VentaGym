@extends('adminlte::page')

@section('title', 'Editar de Proveedores')

@section('content')
<br>
<main class="discussion-mp">
  <div class="main-section">
      <div class="container">
          <div class="row justify-content-md-center">
              <div class="col-lg-10 col-md-10">
                <div>
                    <form action="{{ url('/provides/'.$provide->id)}}" method="POST" enctype="multipart/form-data">
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
                            <h5 class="card-header">Editar de Proveedores</h5>
                            <div class="card-body">
                                <div class="card">
                                    <h5 class="card-header">Empresa</h5>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>                                                
                                                <tr>
                                                    <th colspan="2"><input type="text" name="razon_social" class="form-control" placeholder="Razón Social" value="{{ isset($provide->razon_social)?$provide->razon_social:'' }}"></th>
                                                    <th><input type="text" name="ruc" class="form-control" placeholder="RUC" value="{{ isset($provide->ruc)?$provide->ruc:'' }}"></th>
                                                </tr>
                                                <tr>
                                                    <th><input type="text" name="rubro" class="form-control" placeholder="Rubro" value="{{ isset($provide->rubro)?$provide->rubro:'' }}"></th>
                                                    <th><input type="text" name="categoria" class="form-control" placeholder="Categoría" value="{{ isset($provide->categoria)?$provide->categoria:'' }}"></th>
                                                    <th><input type="text" name="pagina_web" class="form-control" placeholder="Página web" value="{{ isset($provide->pagina_web)?$provide->pagina_web:'' }}"></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3"><input type="text" name="direccion" class="form-control" placeholder="Dirección" value="{{ isset($provide->direccion)?$provide->direccion:'' }}"></th>
                                                </tr>
                                                <tr>
                                                    <th><input type="text" name="departamento" class="form-control" placeholder="Departamento" value="{{ isset($provide->departamento)?$provide->departamento:'' }}"></th>
                                                    <th><input type="text" name="provincia" class="form-control" placeholder="Provincia" value="{{ isset($provide->provincia)?$provide->provincia:'' }}"></th>
                                                    <th><input type="text" name="distrito" class="form-control" placeholder="Distrito" value="{{ isset($provide->distrito)?$provide->distrito:'' }}"></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <h5 class="card-header">Persona de contacto</h5>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="2"><input type="text" name="nombres" class="form-control" placeholder="Nombres" value="{{ isset($provide->nombres)?$provide->nombres:'' }}"></th>
                                                    <th colspan="2"><input type="text" name="apellidos" class="form-control" placeholder="Apellidos" value="{{ isset($provide->apellidos)?$provide->apellidos:'' }}"></th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <select class="form-control" name="tipo_doc" id="tipo_doc">

                                                            <option value="{{ isset($provide->tipo_doc)?$provide->tipo_doc:'' }}" disabled selected>{{$provide->tipo_doc}}</option>
                                                            @foreach($documents as $document )
                                                                <option value="{{ $document['name'] }}">{{ $document['name'] }}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                    </th>
                                                    <th><input type="text" name="number_doc" class="form-control" placeholder="N°" value="{{ isset($provide->number_doc)?$provide->number_doc:'' }}"></th>
                                                    <th>                                                        
                                                          <select class="form-control" name="genero" id="genero">
                                                            <option value="{{ isset($provide->genero)?$provide->genero:'' }}" disabled selected>{{$provide->genero}}</option>
                                                            @foreach($genders as $gender )
                                                                <option value="{{ $gender['name'] }}">{{ $gender['name'] }}</option>
                                                            @endforeach                                                            
                                                        </select>
                                                    </th>
                                                    <th><input type="text" name="telefono" class="form-control" placeholder="Número de Teléfono" value="{{ isset($provide->telefono)?$provide->telefono:'' }}"></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="4"><input type="correo" class="form-control" name="correo" placeholder="Correo Electrónico" value="{{ isset($provide->correo)?$provide->correo:'' }}"></th>
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
                                            <th><a href="/provides" class="btn btn-secondary">VOLVER</a></th>
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
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop