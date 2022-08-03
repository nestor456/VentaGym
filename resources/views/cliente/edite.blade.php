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
                                          <th scope="col">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="radio" name="tipo_cp" id="inlineRadio1" value="option1">
                                              <label class="form-check-label" for="inlineRadio1">Persona Natural</label>
                                            </div>              
                                          </th>
                                          <th scope="col">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="radio" name="tipo_cp"  id="inlineRadio2" value="option2">
                                              <label class="form-check-label" for="inlineRadio2">Empresa</label>
                                            </div>
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
                              
                                <div class="card">
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
                                          <th><input type="text" class="form-control" name="departamento" value="{{ isset($cliente->departamento)?$cliente->departamento:'' }}" placeholder="Departamento"></th>
                                          <th><input type="text" class="form-control" name="provincia" value="{{ isset($cliente->provincia)?$cliente->provincia:'' }}" placeholder="Provincia"></th>
                                          <th><input type="text" class="form-control" name="distrito" value="{{ isset($cliente->distrito)?$cliente->distrito:'' }}"  placeholder="Distrito"></th>
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