<tr class="selected" id="fila' + cont +'">
    <td>
        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times fa-2x"></i></button></td> 
        <td>
            <input type="hidden" name="producto_id[]" value="' + producto_id + '">' + producto + '</td> 
            <td><input type="hidden" name="precio[]" value"' + parseFloat(precio).toFixed(2) + '" > <input class="form-control" type="number" value="' + parseFloat(precio).toFixed(2) + '" disabled></td> 
            <td> <input class="form-control" type="hidden" name="quantity[]" value="' + quantity + '"> <input type="number" value="' + quantity + '" class="form-control" disabled> </td> 
            <td align="right">s/' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>