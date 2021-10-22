@extends('layouts.menu')

@section('content')
<div class="container-fluid" >
<div class="row">

        <div class="col-12 col-md-4 text-center">
            <span>Fecha de consulta: <b> </b></span>
            <div class="form-group">
                <strong>{{\Carbon\Carbon::now()->format('d/m/y')}}</strong>
            </div>
        </div>
        <div class="col-12 col-md-4 text-center">
            <span>Cantidan de registros: <b> </b></span>
            <div class="form-group">
                <strong>{{$ventas->count()}}</strong>
            </div>
        </div>
        <div class="col-12 col-md-4 text-center">
            <span>Total de ingreso: <b> </b></span>
            <div class="form-group">
                <strong>{{$total}}</strong>
            </div>
        </div>

    <div class="table-responsive col-xl-12">
        <table class="table table-striped table-hover">
            <thead>
                <th>Nombre y Apellidos</th>
                <th>DNI</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                    
                    <tr>
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

@endsection