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
    public function index(Request $request)
    {   
        $texto = trim($request->get('texto'));

        $datos = Venta::where('id','like','%'.$texto.'%')->paginate(10);               
            $details = [];
                foreach ($datos as $data) {
                        $fecha_i=$data->fecha_ini;            
                        $fecha_f=$data->fecha_fin;        
                        $fecha_ini = Carbon::parse($fecha_i);
                        $fecha_fin = Carbon::parse($fecha_f);
                        $now = Carbon::now()->subDays();                          
                        $cliente = Cliente::find($data->cliente_id);                        

                        $forma = $data->forma_pago;
                        $rest = $fecha_fin->diffInDays($now);  

                        if ($forma == "Credito" && $rest <= 3) {
                            $mensaje = "ROJO";
                            $color = "#ff360b";
                        }elseif($forma == "Credito" && $rest > 3){
                            $mensaje = "AMARILLO";
                            $color = "#fff10c";
                        }elseif($forma == "Al contado"){
                            $mensaje = "VERDE";
                            $color = "#1dc12c";
                        }

                    $details[] = [
                        'id'=> $data->id,
                        'cliente_id'=> $data->cliente_id,
                        'Nombre'=> $cliente->Nombre, 
                        'ApellidoPaterno'=> $cliente->ApellidoPaterno, 
                        'ApellidoMaterno'=> $cliente->ApellidoMaterno,
                        'dni'=> $data->dni,
                        'user_id'=> $data->user_id,
                        'forma_pago'=> $data->forma_pago,
                        'obserbacion'=> $data->obserbacion,
                        'fecha_ini'=> $data->fecha_ini,
                        'fecha_fin'=> $data->fecha_fin,
                        'sale_date'=> $data->sale_date,
                        'tax'=> $data->tax,
                        'total'=> $data->total,
                        'status'=> $data->status,
                        'mensaje'=> $mensaje,
                        'color'=> $color,
                        'diff' => $fecha_ini->diffInDays($fecha_fin),
                        'rest' => $fecha_fin->diffInDays($now)                     
                    ];                              
                }
                //dd($details);
        return view('venta.index', compact('datos', 'details','texto'));
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
        $campos=[
            'forma_pago'=>'required|string|max:100'        
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

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

        $fecha_ini = request()->fecha_ini;
        $fecha_fin = request()->fecha_fin;
        
        $dni = request()->dni;

        $venta = Venta::find($id);
        $venta->fill(['forma_pago' => $forma_pago])->save();   
        $venta->fill(['obserbacion' => $obserbacion])->save();  

        $venta->fill(['fecha_ini' => $fecha_ini])->save();   
        $venta->fill(['fecha_fin' => $fecha_fin])->save();
        $venta->fill(['dni' => $dni])->save();

        return redirect('venta')->with('info','El rol se edito con éxito');
    }

     function destroy($id)
    {
        Venta::destroy($id);
        return redirect()->route('admin.venta.index')->with('info','La venta se eliminado con éxito');
    }

    public function pdf($id)
    {
        $venta = Venta::findOrFail($id);
        $subtotal = 0;
        $detalleVentas = $venta->detalleVenta;
        foreach($detalleVentas as $detalleVenta){
            $subtotal += $detalleVenta->quantity*$detalleVenta->precio;
            
        }

        $pdf = PDF::loadView('venta.pdf', compact('venta','subtotal','detalleVentas'));

        return $pdf->download('Reporte_de_venta'.$venta->id.'.pdf');
    }

}
