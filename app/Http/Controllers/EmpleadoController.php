<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        abort_if(Gate::denies('empleado.index'), 403);


        $texto = trim($request->get('texto'));

       $empleados = DB::table('empleados')
                    ->select('id','Nombre','ApellidoPaterno','ApellidoMaterno','dni','Telefono','Correo','Domicilio')
                    ->where('ApellidoPaterno','LIKE','%'.$texto.'%')
                    ->orwhere('dni','LIKE','%'.$texto.'%')
                    ->orderBy('ApellidoPaterno','asc')
                    ->paginate(10);

       //echo $empleado;


        //$datos['empleados']=Empleado::paginate(5);
        //return view('empleado.index',$empleados);
        return view('empleado.index',compact('empleados','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(Gate::denies('empleado.create'), 403);
        $areas = Area::all();
        return view('empleado.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'dni'=>'required|string|max:8',
            'Telefono'=>'required|string|max:9',
            'Correo'=>'required|email',
            'Domicilio'=>'required|string|max:100',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request, $campos, $mensaje);

        $validator = Validator::make(['dni' => $request->get('dni')], [
            'dni' => 'required|string|max:8|unique:empleados',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'El DNI ya existe');
        }  

        //$datosEmpleado = request()->all(); 
        $datosEmpleado = request()->except('_token'); 

        Empleado::insert($datosEmpleado);  

        return redirect('empleado')->with('info','El empleado se creó con éxito'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('empleado.update'), 403);
        $areas = Area::all();
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edite', compact('empleado','areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'dni'=>'required|string|max:8',
            'Telefono'=>'required|string|max:9',
            'Correo'=>'required|email',
            'Domicilio'=>'required|string|max:100',
        ]);        
        
        $datosEmpleado = request()->except(['_token','_method']);

        Empleado::where('id','=',$id)->update($datosEmpleado);
        return redirect('empleado')->with('info','El empleado se edito con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('empleado.destroy'), 403);
        //
        Empleado::destroy($id);
        
        return redirect('empleado')->with('info','El empleado se borro con éxito');
    }
}
