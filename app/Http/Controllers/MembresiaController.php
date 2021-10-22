<?php

namespace App\Http\Controllers;

use App\Models\Membresia;
use Illuminate\Http\Request;

class MembresiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$datos['membresias'] = Membresia::paginate(10);
        $membresias = Membresia::paginate(10);
        return view('membresia.index',compact('membresias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('membresia.create');
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
        /*$campos=[
            'NombreMembresia'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);*/
        $request->validate([
            'NombreMembresia'=>'required|string|max:100',
        ]); 

        $datosMembresia = request()->except('_token'); 
        Membresia::insert($datosMembresia);
        return redirect('membresia')->with('info','La membresia se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membresia  $membresia
     * @return \Illuminate\Http\Response
     */
    public function show(Membresia $membresia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membresia  $membresia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $membresia = Membresia::findOrFail($id);
        return view('membresia.edite', compact('membresia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membresia  $membresia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosMembresia = request()->except(['_token','_method']);
        Membresia::where('id','=',$id)->update($datosMembresia);
        return redirect('membresia')->with('info','La membresia se edito con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membresia  $membresia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Membresia::destroy($id);
        return redirect('membresia')->with('info','La membresia se elimino con éxito');
    }
}
