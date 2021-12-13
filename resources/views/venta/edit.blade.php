@extends('layouts.menu')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/venta/'.$venta->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                
<div class="form-group">
    <label for="cliente_id">Cliente</label>
    <input type="text" class="form-control" disabled="disabled" value="{{$venta->cliente->Nombre}} {{$venta->cliente->ApellidoPaterno}} {{$venta->cliente->ApellidoMaterno}}">
</div>
<div class="form-group">
    <label for="cliente_id">Vendedor</label>
    <input type="text" class="form-control" disabled="disabled" value="{{$venta->user->name}}">
</div>
<div class="form-group">
    <label for="cliente_id">Numero Venta</label>
    <input type="text" class="form-control" disabled="disabled" value="{{$venta->id}}">
</div>
<div class="form-group">
    <label for="forma_pago">forma de pago</label>
    <select class="form-control" name="forma_pago" id="forma_pago" onchange="seleccionado()">
        @foreach($pagos as $pago)
        <option value="{{ $pago['name'] }}">{{ $pago['name'] }}</option>
        @endforeach
      </select>
</div>

<div class="credito" id="credito" style="display:none;">
    <div class="form-group">
        <label for="tax">Obserbacion</label>
        <input type="text" class="form-control" name="obserbacion" id="obserbacion" value="{{ isset($venta->obserbacion)?$venta->obserbacion:'' }}" aria-describedat="helpId">
    </div>
    <div class="row">
        <div class="col-12 col-md-3">
            <samp>Fecha inicial</samp>
            <div class="form-group">
                <input class="form-control" type="date" value="{{old('fecha_ini')}}" name="fecha_ini" id="fecha_ini">
            </div>
        </div>
        <div class="col-12 col-md-3">
            <samp>Fecha final</samp>
            <div class="form-group">
                <input class="form-control" type="date" value="value="{{ isset($venta->fecha_fin)?$venta->fecha_fin:'' }}"" name="fecha_fin" id="fecha_fin">
            </div>
        </div>
    </div> 
</div>

<div class="form-group">
    <h4 class="card-title">Detalles de Venta</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio de venta(PEN)</th>
                    <th>Cantidad</th>
                    <th colspan="3">SubTotal(PEN)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO: {{$venta->tax}}%</p>
                    </th>
                    <th>
                        <p align="left"><span id="total_impuesto">s/{{number_format($subtotal*$venta->tax/100,2)}}</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="left"><span align="right" id="total_pagar_html">{{number_format($venta->total,2)}}</span><input type="hidden"  name="total" type="text" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($detalleVentas as $detalleVenta)
                    <tr>
                        <td>{{$detalleVenta->producto->NombreProducto}}</td>
                        <td>{{$detalleVenta->precio}}</td>
                        <td>{{$detalleVenta->quantity}}</td>
                        <td colspan="3">{{number_format($detalleVenta->quantity*$detalleVenta->precio)}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>



                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary float-right">Actualizar</button>
                    <a href="{{ url('venta') }}" class="btn btn-light">cancelar</a>
                </div>
            </form>
        </div>
    </div>    
</div>

@endsection
<script>
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
        document.getElementById('fecha_fin').value = ano+"-"+mes+"-"+dia;
    }
    function seleccionado(){
        var opt = $('#forma_pago').val();
        
        //alert(opt);
        if(opt=="Credito"){
            $('#credito').show();
        }
        if(opt=="Al contado"){
            $('#credito').hide();
        }
    }
</script>