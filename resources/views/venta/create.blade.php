@extends('layouts.menu')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/venta')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('venta.form',['modo'=>'Create'])
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                    <a href="{{ url('venta') }}" class="btn btn-light">cancelar</a>
                </div>
            </form>
        </div>
    </div>    
</div>


<script>
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
    

    
</script>

@endsection