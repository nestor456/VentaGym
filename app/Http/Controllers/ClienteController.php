<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Membresia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use ILLuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = Cliente::get();
       foreach ($clientes  as $cliente) {
        $Fecha_Inicio = DateTime($cliente->Fecha_Inicio);
        $Fecha_Final = DateTime($cliente->Fecha_Final);

        $diff = date_diff($Fecha_Inicio,$Fecha_Final);
        dd($diff);
       }

        $datos['clientes'] = Cliente::paginate(10);
        return view('cliente.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $empleados = Empleado::all();
        $menbresias = Membresia::all();
        return view('cliente.create', compact('empleados','menbresias'));
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
            'Membresia'=>'required|string|max:100',
            'Entrenador'=>'required|string|max:100',
            'Objetivo_fisico'=>'required|string|max:100',
            'Fecha_Inicio'=>'required|string|',
            'Fecha_Final'=>'required|string|',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request, $campos, $mensaje);

        $validator = Validator::make(['dni' => $request->get('dni')], [
            'dni' => 'required|string|max:8|unique:clientes',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'El DNI ya existe');
        }  

        $datosCliente = request()->except('_token'); 

        if($request->hasFile('Foto')){

            $datosCliente['Foto']=$request->file('Foto')->store('uploads','public');

        }
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
        $cliente = Cliente::findOrFail($id);
        $empleados = Empleado::all();
        $menbresias = Membresia::all();
        return view('cliente.edite', compact('cliente','empleados','menbresias'));
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
        $request->validate([
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
        ]);

        $datosCliente = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){

            $datosCliente['Foto']=$request->file('Foto')->store('uploads','public');

        }
        
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
        Cliente::destroy($id);
        return redirect('cliente')->with('info','El cliente se elimino con éxito');
    }
}
