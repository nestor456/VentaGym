<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Reporte de venta</title>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
        }
        @font-face {
            font-family: 'Arial';
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            src: url("{{ public_path('fonts/arial.ttf') }}") format("truetype");
        }
        body {
            margin: 2cm 1cm 1cm;
        }
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            text-align: center;
            line-height: 30px;
        }
        main {
            margin-top: 60px;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #02082a;
            color: white;
            text-align: center;
            line-height: 35px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }
        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }
        table th,
        table td {
            text-align: center;
        }
        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }
        table .service,
        table .desc {
            text-align: left;
        }
        table td {
            padding: 20px;
            text-align: center;
        }
        table td.service,
        table td.desc {
            vertical-align: top;
        }
        table td.unit,
        table td.qty,
        table td.total {
            font-size: 13px;
        }
        table td.grand {
            border-top: 1px solid #5D6975;;
        }
        .row {
            display: inline-flex;
            width: 100%;
        }
        #company {
            width: 50%;
            float: right;
        }
        #customer {
            width: 100%;
        }
        #customer span {
            color: #2b303b;
            text-align: right;
            margin-right: 10px;
            font-size: 13px;
            font-weight: bold;
        }
        hr{
            margin-bottom: 20px;
        }

    </style>
  </head>
  <body>
    <header>
        <div class="row">
            <table>
                <tr style="background: #fff">
                    <td width="50%" style="background: #fff; text-align: left">
                    
                    </td>
                    <td width="50%" style="background: #fff; font-size: 13px; line-height: 13px; text-align: left">
                        TEMPLOGYM <br>
                            Tu direccion de empresa <br>
                            Tel.: 042-530431 Cel.945 057 517 #9445 225 124 <br>
                            Email.: empresa@gmail.com
                    </td>
                </tr>
            </table>
        </div>
    </header>
    <main>
        <div class="row">
            <table>
                <tr style="background: #fff">
                    <td width="50%" style="background: #fff; text-align: left">
                        <div id="customer">
                            <div><span>CLIENTE: {{$venta->cliente->Nombre}} {{$venta->cliente->ApellidoPaterno}} {{$venta->cliente->ApellidoMaterno}}</div>
                            <div><span>DOCUMENTO: {{$venta->cliente->dni}}</div>
                            <div><span>EMAIL: {{$venta->cliente->Correo}}</div>
                            <div><span>FECHA EMISION: {{$venta->sale_date}}</div>
                        </div>
                    </td>
                    <td width="50%" style="background: #fff; font-size: 13px; line-height: 13px; text-align: left">
                        <div id="customer">
                            <div><span>VENDEDOR: </span> {{$venta->user->name}}</div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <table >
            <thead>
                <tr>
                    <th class="service" >ITEM</th>
                    <th class="desc">PRODUCTO</th>
                    <th>CANT.</th>
                    <th>PRECIO</th>
                </tr>
            </thead>
            <tbody>
            @foreach($detalleVentas as $detalleVenta)
                 <tr>
                    <td class="item text">{{$detalleVenta->id}}</td>
                    <td class="brand">{{$detalleVenta->producto->NombreProducto}}</td>
                    <td class="qty">{{$detalleVenta->quantity}}</td>
                    <td class="unit">{{$detalleVenta->precio}}</td>
                </tr>
            @endforeach

                <tr>
                    <td colspan="6">SUBTOTAL</td>
                    <td class="total">{{ $subtotal }}</td>
                </tr>

                
                <tr>
                    <td colspan="6">IGV 18%</td>
                    <td class="total">{{$venta->tax}}</td>
                </tr>
                <tr>
                    <td colspan="6" class="grand total">TOTAL</td>
                    <td class="grand total">{{$venta->total}}</td>
                </tr>
                </tbody>
        </table>
    </main>
  </body>
</html>