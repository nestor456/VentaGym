<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ventasmes=DB::select('SELECT MonthName(v.sale_date) as mes, sum(v.total) as totalmes from ventas v where v.status="VALID" group by MonthName(v.sale_date) order by month(v.sale_date) desc limit 12');
        

        $ventasdias=DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") as dia, sum(v.total) as totaldia from ventas v where v.status="VALID" group by v.sale_date order by day(v.sale_date) desc limit 15');

        $productosvendidos=DB::select('SELECT sum(dv.quantity) as quantity, p.NombreProducto as name, p.id as id, p.stock as stock from productos p
        inner join detalle_ventas dv on p.id=dv.producto_id
        inner join ventas v on dv.venta_id=v.id where v.status="VALID"
        and year(v.sale_date)=year(curdate())
        group by p.NombreProducto, p.id, p.stock order by sum(dv.quantity) desc limit 10');       

        return view('home', compact('ventasmes','ventasdias','productosvendidos'));
    }
}
