<?php

namespace App\Http\Controllers;

use App\Models\Asistencia_cliente;
use App\Models\Cliente;
use Illuminate\Http\Request;

class AsistenciaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencias = Asistencia_cliente::paginate(10);
        return view('asistencia_cliente.index', compact('asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
