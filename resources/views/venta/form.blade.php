
<div class="form-group">
    <label for="cliente_id">Cliente</label>
    <select class="form-control" name="cliente_id" id="cliente_id">
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id}}">{{$cliente->Nombre}} {{$cliente->ApellidoPaterno}} {{$cliente->ApellidoMaterno}}</option>
        @endforeach
    </select>
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


