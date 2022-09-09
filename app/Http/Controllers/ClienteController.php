<?php

namespace App\Http\Controllers;

use App\Models\Cliente;

use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use ILLuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('cliente.index'), 403);
        
        $clientes = Cliente::paginate(15); 
    /*$texto = trim($request->get('texto'));
      $datos = DB::table('clientes')
                    ->select('id','Nombre', 'ApellidoPaterno', 'ApellidoMaterno','dni','Telefono','Correo','Membresia','Entrenador','Objetivo_fisico','Foto','Fecha_Inicio','Fecha_Final','gym','congelar_membresia','observacion','deleted_at')
                    ->where('dni','LIKE','%'.$texto.'%')
                    ->paginate(10);
        //$datos = Cliente::paginate(10);
        $details = [];
        foreach ($datos as $data) {
            $fecha_i=$data->Fecha_Inicio;            
            $fecha_f=$data->Fecha_Final; 
            $fecha_ini = Carbon::parse($fecha_i);
            $fecha_fin = Carbon::parse($fecha_f);
            $now = Carbon::now()->subDays();
            $deleted_at = $data->deleted_at;
           if($deleted_at == null){
            $details[] = [
                'id'=> $data->id,
                'Nombre'=> $data->Nombre, 
                'ApellidoPaterno'=> $data->ApellidoPaterno, 
                'ApellidoMaterno'=> $data->ApellidoMaterno,
                'dni'=> $data->dni,
                'Telefono'=> $data->Telefono,
                'Correo'=> $data->Correo,
                'Membresia'=> $data->Membresia,
                'Entrenador'=> $data->Entrenador,
                'Objetivo_fisico'=> $data->Objetivo_fisico,
                'Foto'=> $data->Foto,
                'gym'=> $data->gym,
                'Fecha_Inicio'=> $data->Fecha_Inicio,
                'Fecha_Final'=> $data->Fecha_Final,
                'congelar_membresia'=> $data->congelar_membresia,
                'diff' => $fecha_ini->diffInDays($fecha_fin),
                'rest' => $fecha_fin->diffInDays($now)   
            ];
           }            
        }*/
        //dd($details);
        $clientedias=DB::select('SELECT DATE_FORMAT(c.fecha,"%d/%m/%Y") as dia, count(c.id) as totaldia from clientes c group by c.fecha order by day(c.fecha) desc limit 15');
        //dd($clientedias);
        return view('cliente.index', compact('clientes','clientedias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departamentos = Departamento::get();
        abort_if(Gate::denies('cliente.create'), 403);
        return view('cliente.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'dni'=>'required|string|max:8',
            'Telefono'=>'required|string|max:9',
            'Correo'=>'required|email',
            'Membresia'=>'required|string|max:100',
            'Entrenador'=>'required|string|max:100',
            'Objetivo_fisico'=>'required|string|max:100',
            'Fecha_Inicio'=>'required|string|',
            'Fecha_Final'=>'required|string|',
            'gym'=>'required|string|',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request, $campos, $mensaje);*/

        $validator = Validator::make(['number_doc' => $request->get('number_doc')], [
            'number_doc' => 'required|string|max:8|unique:clientes',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'El DNI ya existe');
        }  

        $datosCliente = request()->except('_token'); 

        Cliente::insert($datosCliente);

        return redirect('cliente')->with('info','El cliente se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        abort_if(Gate::denies('cliente.update'), 403);
        $departamentos = Departamento::get();
        $cliente = Cliente::findOrFail($id);

        $departament = Departamento::findOrFail($cliente->departamento);
        $provicia = Provincia::findOrFail($cliente->provincia);
        $distrito = Distrito::findOrFail($cliente->distrito);
        //dd($provicia);
        return view('cliente.edite', compact('cliente','departamentos','departament','provicia','distrito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        /*$request->validate([
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'dni'=>'required|string|max:8',
            'Telefono'=>'required|string|max:9',
            'Correo'=>'required|email',
            'Membresia'=>'required|string|max:100',
            'Entrenador'=>'required|string|max:100',
            'Objetivo_fisico'=>'required|string|max:100',
            'Fecha_Inicio'=>'required|string|',
            'Fecha_Final'=>'required|string|',
        ]);*/

        $datosCliente = request()->except(['_token','_method']);
        
        Cliente::where('id','=',$id)->update($datosCliente);
        return redirect('cliente')->with('info','El cliente se edito con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        abort_if(Gate::denies('cliente.destroy'), 403);
        Cliente::destroy($id);
        return redirect('cliente')->with('info','El cliente se elimino con éxito');
    }
}
