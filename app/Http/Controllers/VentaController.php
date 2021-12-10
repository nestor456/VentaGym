<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Pagos;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Auth;

use Barryvdh\DomPDF\Facade as PDF;

class VentaController extends Controller
{

    public function index()
    {
        $ventas = Venta::paginate(10);

        $fechaVentas = Venta::where('status', 'VALID')->get();
        foreach ($fechaVentas as $fechaVenta) {

            $fecha_i=$fechaVenta->fecha_ini;            
            $fecha_f=$fechaVenta->fecha_fin;

            $fecha_ini = new Carbon($fecha_i);
            $fecha_fin = new Carbon($fecha_f);

            $diff = $fecha_ini->diffInDays($fecha_fin);
        }

               
        return view('venta.index', compact('ventas','diff'));
    }
    public function create()
    {
        $clientes = Cliente::get();
        $productos = Producto::get();
        $pagos = Pagos::get();
        return view('venta.create',compact('clientes','productos','pagos'));
    }    
    public function store(Request $request)
    { 
        $venta = Venta::create($request->all()+[
            'user_id' => auth()->id(),
            'sale_date'=>Carbon::now('America/lima'),
        ]); 

        $id_producto = $request->producto_id;
        $quantity = $request->quantity;

        $stock = Producto::select('stock')->where('id',$id_producto)->first();      
        
        foreach($request->producto_id as $key => $producto){

            $results[] = array("producto_id"=>$request->producto_id[$key],
            "quantity"=>$request->quantity[$key], "precio"=>$request->precio[$key]);

            $nuevostock = $stock->stock - $request->quantity[$key];
            
            $producto = Producto::find($producto);
            $producto->fill(['stock' => $nuevostock])->save();
            
        }             
        $venta->DetalleVenta()->createMany($results);
        return redirect('venta');
    }

    public function show(Venta $venta)
    {
        //
    }

    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        $clientes = Cliente::where('id',$venta->cliente_id)->get();
        $pagos = Pagos::all();
        $subtotal = 0 ;
        $detalleVentas = $venta->detalleVenta;
        foreach($detalleVentas as $detalleVenta){
            $subtotal += $detalleVenta->quantity * $detalleVenta->precio;
        }
        
        return view('venta.edit', compact('venta','clientes','detalleVentas','subtotal','pagos'));
    }

    public function update(Request $request, $id)
    {
        $forma_pago = request()->forma_pago;
        $obserbacion= request()->obserbacion;
        $venta = Venta::find($id);
        $venta->fill(['forma_pago' => $forma_pago])->save();   
        $venta->fill(['obserbacion' => $obserbacion])->save();  

        return redirect('venta')->with('info','El rol se edito con éxito');
    }

     function destroy($id)
    {
        Venta::destroy($id);
        return redirect()->route('admin.venta.index')->with('info','La venta se eliminado con éxito');
    }

    public function pdf(Venta $venta)
    {
        $subtotal = 0;
        $detalleVentas = $venta->detalleVenta;
        foreach($detalleVentas as $detalleVenta){
            $subtotal += $detalleVenta->quantity*$detalleVenta->precio;
            
        }

        $pdf = PDF::loadView('venta.pdf', compact('venta','subtotal','detalleVentas'));

        return $pdf->download('Reporte_de_venta'.$venta->id.'.pdf');
    }
}
