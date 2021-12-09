@extends('layouts.menu')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/venta')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="cliente_id">Cliente</label>
                    <select class="form-control" name="cliente_id" id="cliente_id">
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id}}">{{$cliente->Nombre}} {{$cliente->ApellidoPaterno}} {{$cliente->ApellidoMaterno}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label>forma de pago</label>
                    <select class="form-control" name="forma_pago" id="forma_pago">
                        @foreach($pagos as $pago)
                        <option value="{{$pago->id}}">{{$pago->name}}</option>
                        @endforeach
                      </select>
                </div>
                
                <div class="credito" id="credito">
                    <div class="form-group">
                        <label for="tax">Obserbacion</label>
                        <input type="text" class="form-control" name="obserbacion" id="obserbacion" aria-describedat="helpId">
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <samp>Fecha inicial</samp>
                            <div class="form-group">
                                <input class="form-control" type="date" name="fecha_ini" id="fecha_ini">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <samp>Fecha final</samp>
                            <div class="form-group">
                                <input class="form-control" type="date" name="fecha_fin" id="fecha_fin">
                            </div>
                        </div>
                    </div>  
                </div>   
                
                
                <div class="form-group">
                    <label for="tax">Impuesto</label>
                    <input type="number" class="form-control" name="tax" id="tax" aria-describedat="helpId" value="18" required>
                </div>
                
                <div class="form-group">
                    <label for="producto_id">Producto</label>
                    <select class="form-control" name="producto_id" id="producto_id">
                        <option value="" disabled selected>Seleccione un producto</option>
                        @foreach($productos as $producto)
                            <option value="{{$producto->id}}_{{$producto->stock}}_{{$producto->precio}}">{{$producto->NombreProducto}}</option>
                        @endforeach        
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="stock">Stock actual</label>
                    <input type="text" name="" id="stock" value="" class="form-control" disabled>
                </div>
                
                <div class="form-group">
                    <label for="quantity">Cantidad</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" aria-describedat="helpId">
                </div>
                
                <div class="form-group">
                    <label for="precio">Precio de Venta</label>
                    <input type="number" class="form-control" name="" id="precio" aria-describedat="helpId" disabled>
                </div>
                
                <div class="form-group">
                    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar Venta</button>
                </div>
                
                <div class="form-group">
                    <h4 class="card-title">Detalles de Venta</h4>
                    <div class="table-responsive col-md-12">
                        <table id="detalles" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Eliminar</th>
                                    <th>Producto</th>
                                    <th>Precio de venta(PEN)</th>
                                    <th>Cantidad</th>
                                    <th>SubTotal(PEN)</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="4">
                                        <p align="right">TOTAL:</p>
                                    </th>
                                    <th>
                                        <p align="right"><span id="total">PEN 0.00</span></p>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="4">
                                        <p align="right">TOTAL IMPUESTO:</p>
                                    </th>
                                    <th>
                                        <p align="right"><span id="total_impuesto">PEN 0.00</span></p>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="4">
                                        <p align="right">TOTAL PAGAR:</p>
                                    </th>
                                    <th>
                                        <p align="right"><span align="right" id="total_pagar_html">0.00</span><input type="hidden"  name="total" type="text" id="total_pagar"></p>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                
                    </div>
                </div>

                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                    <a href="{{ url('venta') }}" class="btn btn-light">cancelar</a>
                </div>
            </form>
        </div>
    </div>    
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $("#agregar").click(function (){
            agregar();
        });
    });
    
    var cont = 1;
    total = 0;
    subtotal = [];

    $("#guardar").hide();
    $("#producto_id").change(mostrarValores); 

    function mostrarValores() {
       datosProductos = document.getElementById('producto_id').value.split('_');       
       $("#precio").val(datosProductos[2]);
       $("#stock").val(datosProductos[1]);
    } 

    function agregar(){
        datosProducto = document.getElementById('producto_id').value.split('_');
    
        producto_id = datosProducto[0];
        producto = $("#producto_id option:selected").text();
        quantity = $("#quantity").val();
        precio = $("#precio").val();
        stock = $("#stock").val();
        impuesto = $("#tax").val();
        if(producto_id != "" && quantity != "" && quantity > 0 && precio != ""){
            if(parseInt(stock) >= parseInt(quantity)){
                subtotal[cont] = (quantity * precio);
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila' + cont +'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="producto_id[]" value="' + producto_id + '">' + producto + '</td> <td><input type="hidden"  name="precio[]" value="' + parseFloat(precio).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(precio).toFixed(2) + '" disabled> </td> <td> <input class="form-control" type="hidden" name="quantity[]" value="' + quantity + '"> <input type="number" value="' + quantity + '" class="form-control" disabled> </td> <td align="right">s/' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';
                cont++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            }
        }else{
            Swal.fire({
                type: 'error',
                text: 'La cantidad a vender supera el stock.',
            })
        }
    }
    function limpiar(){
        $('#quantity').val("");
        $('#precio').val("");
    }
    function totales(){
        $('#total').html("PEN" + total.toFixed(2));
                
        total_impuesto = total * impuesto / 100;
        total_pagar = total + total_impuesto;

        $("#total_impuesto").html("PEN " + total_impuesto.toFixed(2));
        $("#total_pagar_html").html("PEN " + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
        //console.log(total_pagar);       
    }

    function evaluar(){
        if(total > 0){
            $("#guardar").show();
        }else{
            $("#guardar").hide();
        }
    }

    function eliminar(index){
        total = total - subtotal[index];
        total_impuesto = total * impuesto / 100;
        console.log(total_impuesto);
        total_pagar_html = total + total_impuesto;
        $("#total").html("PEN" + total);
        $("#total_impuesto").html("PEN" + total_impuesto);
        $("#total_pagar_html").html("PEN" + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));
        $("#fila" + index).remove();
        evaluar();
    }

    window.onload = function(){
        var fecha = new Date(); //fecha actual
        var mes = fecha.getMonth()+1;//obteniendo mes
        var dia = fecha.getDate();//obteniendo dia
        var ano = fecha.getFullYear();//obteniendo año
        if(dia<10){
            dia='0'+dia;//agregar cero si es menor de 10
        }            
        if(mes<10){
            mes='0'+mes;//agregar cero si es menor de 10
        }            
        document.getElementById('fecha_ini').value = ano+"-"+mes+"-"+dia;
    }

    $('#forma_pago').on('change',function(){
        var valor = this.value; //capturamos el valor del option
        var texto = $(this).find('option:selected').text(); //capturamos el texto del option
        
              
    });

    
</script>

@endsection