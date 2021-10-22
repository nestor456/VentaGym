@extends('layouts.menu')

@section('content')

<div class="container-fluid" >
    <div class="card">
        @foreach($ventasmes as $ventasme)
        <div class="row">
            <div class="card-body">
                <div class="card text-white bg-success">
                    <div class="card-body pb-0">
                        <div class="float-right">
                            <i class="fas fa-shopping-cart fa-4x"></i>
                        </div>
    
                        <div class="text-value h2">
                            <strong>PEN {{$ventasme->totalmes}} (MES ACTUAL)</strong>
                        </div>
                        <div class="h2">Ventas</div>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                        @can('admin.venta.index')
                        <a href="{{ url('venta') }}" class="swall-box-footer h4">Ventas <i class="fa fa-arrow-circle-right"></i></a>
                        @endcan
                    </div>
                </div>
            </div>            
        </div> 
        @endforeach       
    </div> 
    <br>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-header">
                        <h4 class="text-center">Venta - Mes</h4>
                    </div>
                    <div class="card-content">
                        <div class="ct-chart">
                            <canvas id="ventas"></canvas>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="card-header">
                        <h4 class="text-center">Venta - Dia</h4>
                    </div>
                    <div class="card-content">
                        <div class="ct-chart">
                            <canvas id="ventasdias"></canvas>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div> 
<br>
    <div class="card">
        <div class="card-body">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Prodctos más vendidos</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table class="table table-boederless table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Cantidad vendida</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productosvendidos as $productosvendido)
                                <tr>
                                    <td class="text-center">{{$productosvendido->id}}</td>
                                    <td class="text-center">{{$productosvendido->name}}</td>
                                    <td class="text-center">{{$productosvendido->stock}}</td>
                                    <td class="text-center">{{$productosvendido->quantity}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script>
        var ctx = document.getElementById('ventas').getContext('2d');
        var ventas = new Chart(ctx, {
            type:'bar',
            data:{
                labels: [<?php foreach($ventasmes as $reg){
                    setlocale(LC_TIME,'es_ES','Spanish_Spain','Spanish');
                    $mes_traducido=strftime('%B',strtotime($reg->mes));

                    echo '"'. $mes_traducido.'",';}?>],
                    
                    datasets:[{
                        label:'Ventas',
                        data:[<?php foreach($ventasmes as $reg){echo ''.$reg->totalmes.',';} ?>],
                        backgroundColor: 'rgba(20, 204, 20, 1)',
                        borderColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth:1
                    }]
            },
            options:{
                scales:{
                    yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                    }]
                }
            }
        }); 
        
        var ventasdias = document.getElementById('ventasdias').getContext('2d');
        var charVenta = new Chart(ventasdias, {
            type:'bar',
            data:{
                labels:[<?php foreach($ventasdias as $ventasdia){
                    $dia = $ventasdia->dia;
                    echo '"'.$dia.'",';}?>],
                datasets:[{
                        label:'Ventas',
                        data:[<?php foreach($ventasdias as $reg){echo ''.$reg->totaldia.',';} ?>],
                        backgroundColor: 'rgba(20, 204, 20, 1)',
                        borderColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth:2
                    }]
            },
            options:{
                scales:{
                    yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                    }]
                }
            }
        })
    </script>
    
@endsection
