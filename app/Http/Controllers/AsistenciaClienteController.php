<?php

namespace App\Http\Controllers;

use App\Models\Asistencia_cliente;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AsistenciaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $asistencias = Asistencia_cliente::whereDate('fecha', Carbon::today('America/Lima'))->get();
        return view('asistencia_cliente.index', compact('asistencias'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {       
        $dni = $request->dni;
        $clientes = Cliente::where('dni',$dni)->first();       
        return view('asistencia_cliente.create',compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $id_cliente = $request->id;

        if($id_cliente){

             $asistencia = Asistencia_cliente::create($request->all()+[
            'cliente_id' => $id_cliente,
            'fecha'=>Carbon::now('America/lima'),
        ]);   

        return redirect('asistencia_cliente')->with('mensaje','Asistencia Registrada');

        }else{
            return redirect('asistencia_cliente')->with('mensaje','DNI no registrado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencia_cliente  $asistencia_cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia_cliente $asistencia_cliente)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia_cliente  $asistencia_cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia_cliente $asistencia_cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistencia_cliente  $asistencia_cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia_cliente $asistencia_cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia_cliente  $asistencia_cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia_cliente $asistencia_cliente)
    {
        //
    }
}
