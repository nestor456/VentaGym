<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
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
        return view('venta.index', compact('ventas'));
    }
    public function create()
    {
        $clientes = Cliente::get();
        $productos = Producto::get();
        return view('venta.create',compact('clientes','productos'));
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

    public function edit(Venta $venta)
    {
        $clientes = Cliente::get();
        return view('venta.edite',compact('clientes'));
    }

    public function update(Request $request, Venta $venta)
    {
        //
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
