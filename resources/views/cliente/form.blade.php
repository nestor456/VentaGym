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

<main class="discussion-mp">
    <div class="main-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-10 col-md-10">
                  <div>
                      <form action="{{ url('/cliente')}}" method="POST" enctype="multipart/form-data">
                       @csrf
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
                                            <th scope="col"><input type="date" class="form-control" name="fecha"></th> 
                                          </tr>
                                        </thead>
                                      </table>
                                    </div>   
                                  </div><br>
                                
                                  <div class="card">
                                    <h5 class="card-header">Persona</h5>
                                    <div class="card-body">
                                      <table class="table table-bordered">
                                          <thead>
                                            <tr>
                                              <th colspan="2"><input type="text" class="form-control" name="nombre" placeholder="Nombres"></th>
                                              <th colspan="2"><input type="text" class="form-control" name="apellido" placeholder="Apellidos"></th>
                                            </tr>
                                            <tr>
                                                <th>
                                                  <select class="form-control" aria-label="Default select example" name="tipo_doc">
                                                    <option selected>Tipo de Documento</option>
                                                    <option value="Dni">Dni</option>
                                                    <option value="Ruc">Ruc</option>
                                                    <option value="CE">CE</option>
                                                  </select>
                                              </th>
                                                <th>
                                                  <input type="number" class="form-control" name="number_doc" placeholder="N°">
                                                </th>
                                                <th>
                                                  <input type="date" class="form-control" name="fecha_naci">
                                                </th>
                                                <th>
                                                  <select class="form-control" aria-label="Default select example" name="genero">
                                                    <option selected>Género</option>
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                    <option value="Otros">Otros</option>
                                                  </select>
                                              </th>
                                            </tr>
                                            <tr>
                                              <th>
                                                <select class="form-control" aria-label="Default select example" name="categoria1">
                                                  <option selected>Categoria</option>
                                                  <option value="Normal">Normal</option>
                                                  <option value="Premium">Premium</option>
                                                  <option value="Inactivo">Inactivo</option>
                                                </select>
                                              </th>
                                              <th>
                                                <input type="text" class="form-control" name="telefono" placeholder="Número de Teléfono">
                                              </th>
                                              <th colspan="2">
                                               <input type="email" class="form-control" name="correo" placeholder="Correo Electrónico">
                                              </th>
                                            </tr>
                                          </thead>
                                      </table>
                                    </div>
                                  </div>
                                
                                  <div class="card" style="display:none;" id="empresa">
                                    <h5 class="card-header">Empresa</h5>
                                    <div class="card-body">
                                      <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th colspan="2">
                                              <input type="text" class="form-control" name="razon_social" placeholder="Razón Social">
                                              </th>
                                            <th>
                                              <input type="text" class="form-control" name="ruc" placeholder="RUC">
                                              </th>
                                          </tr>
                                          <tr>
                                            <th><input type="text" class="form-control" name="rubro" placeholder="Rubro"></th>
                                            <th><input type="text" class="form-control" name="categoria2" placeholder="Categoria"></th>
                                            <th><input type="text" class="form-control" name="pagina_web" placeholder="Página web"></th>
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
                                            <th colspan="3"><input type="text" class="form-control" name="direccion" placeholder="Dirección"></th>
                                          </tr>
                                          <tr> 
                                            <th>
                                                <div class="col-md-15">
                                                    <select class="form-control" name="departamento" id="iddepartamento">
                                                        <option value="" disabled selected>Departamento</option>
                                                        @foreach($departamentos as $departamento)
                                                            <option value="{{ $departamento->id}}">{{$departamento->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                </th>
                                            <th>
                                                <div class="col-md-15">
                                                    <select class="form-control" name="provincia" id="idprovincia">
                                                        <option value="" disabled selected>Provincia</option>
                                                    </select>
                                                </div>                                                
                                            </th>
                                            <th>
                                                <div class="col-md-15">
                                                    <select class="form-control" name="distrito" id="iddistrito">
                                                        <option value="" disabled selected>Distrito</option>
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