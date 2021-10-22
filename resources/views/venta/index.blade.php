@extends('layouts.menu')

@section('content')
<div class="container-fluid" >
<div class="card">
    <div class="table-responsive card-body">
        <a href="{{ url('venta/create') }}" class="btn btn-success">Resgitrar nueva Venta</a>
        <br><br>
        
        <form class="form-inline" action="{{ url('/venta') }}" method="GET">
            <input class="form-control mr-sm-2" name="texto" value="" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>

        <br><br>
        <table class="table table-striped table-dark">
            <thead class="thead-light">
                <th class="text-center">Id</th>
                <th class="text-center">Nombre y Apellidos</th>
                <th class="text-center">DNI</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Total</th>
                <th class="text-center">Estado</th>
                <th class="text-center" colspan="2">Acciones</th>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                    
                    <tr>
                    <td class="text-center">{{ $venta->id }}</td>
                    <td class="text-center">{{ $venta->cliente->Nombre }} {{ $venta->cliente->ApellidoPaterno }} {{ $venta->cliente->ApellidoMaterno }}</td>
                    <td class="text-center">{{ $venta->cliente->dni }}</td>
                    <td class="text-center">{{ $venta->sale_date }}</td>
                    <td class="text-center">{{ $venta->total }}</td>
                    <td class="text-center">{{ $venta->status }}</td>                  
                    <td width="50px">
                        <form action="{{ url('/venta/'.$venta->id ) }}" class="d-inline" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar"> 
                        </form>
                    </td>
                    <td width="50px">
                        <a href="{{route('venta.pdf', $venta) }}" type="button" class="btn btn-primary boton" >Imprimir</a>
                    </td>
                
                    </tr>
                @endforeach                
            </tbody>
        </table>
        {!! $ventas->links() !!}
    </div>
</div>
</div>

@endsection