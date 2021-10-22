@extends('layouts.menu')

@section('content')
<div class="container-fluid" >
    <div class="card">
        <div class="card-body">
            <form action="{{ url('reporte/report_results ')}}" method="post" enctype="multipart/form-data">
                @csrf
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
                            <input class="form-control" type="date" value="{{old('fecha_fin')}}" name="fecha_fin" id="fecha_fin">
                        </div>
                    </div>
                    <div class="col-12 col-md-3 text-center mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                        </div>
                    </div> 
                    <div class="col-12 col-md-4 text-center">
                        <span>Total de ingreso: <b> </b></span>
                        <div class="form-group">
                            <strong>{{$total}}</strong>
                        </div>
                    </div>
                </div>            
            </form>        
            <div class="row">
                <div class="table-responsive col-xl-12">
                    <table class="table table-striped table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Nombre y Apellidos</th>
                            <th>DNI</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Estado</th>
                        </thead>
                        <tbody>
                            @foreach($ventas as $venta)                    
                                <tr>
                                <td>{{ $venta->id }}</td>
                                <td>{{ $venta->cliente->Nombre }} {{ $venta->cliente->ApellidoPaterno }} {{ $venta->cliente->ApellidoMaterno }}</td>
                                <td>{{ $venta->cliente->dni }}</td>
                                <td>{{ $venta->sale_date }}</td>
                                <td>{{ $venta->total }}</td>
                                <td>{{ $venta->status }}</td>                  
                                </tr>
                            @endforeach                
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>  
</div>

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
        document.getElementById('fecha_fin').value = ano+"-"+mes+"-"+dia;
    }
</script>
@endsection