<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Venta;
use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function reports_day(){

        $ventas = Venta::whereDate('sale_date', Carbon::today('America/Lima'))->get();
        $total = $ventas->sum('total');
        
        return view('reporte.reports_day', compact('ventas','total'));
    }

    public function reports_date(){

        $ventas = Venta::whereDate('sale_date', Carbon::today('America/Lima'))->get();
        $total = $ventas->sum('total');

        return view('reporte.reports_date', compact('ventas','total'));
    }
    
    public function report_results(Request $request){
        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $ventas = Venta::whereBetween('sale_date', [$fi, $ff])->get();
        $total = $ventas->sum('total');

        return view('reporte.reports_date', compact('ventas','total'));
    }
}
