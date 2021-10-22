@if(count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>                
            </div>           
@endif
<div class="form-group">
    <label for="Nombre">Nombre del Producto</label>
    <input type="text" name="NombreProducto" id="NombreProducto" class="form-control" value="{{ isset($producto->NombreProducto)?$producto->NombreProducto:'' }}">
</div>
<div class="form-group">
    <label for="Nombre">Detalle</label>
    <textarea class="form-control" name="Detalle" id="Detalle" class="form-control">{{ isset($producto->Detalle)?$producto->Detalle:'' }}</textarea>
</div>
<div class="form-group">
    <label for="Nombre">Stock</label>
    <input type="text" name="stock" id="stock" class="form-control" value="{{ isset($producto->stock)?$producto->stock:'' }}">
</div>
<div class="form-group">
    <label for="Nombre">Precio</label>
    <input type="text" name="precio" id="precio" class="form-control" value="{{ isset($producto->precio)?$producto->precio:'' }}">
</div>

<input type="submit" value="{{ $modo }} Datos" class="btn btn-success">

<a href="{{ url('producto') }}" class="btn btn-primary">Regresar</a>