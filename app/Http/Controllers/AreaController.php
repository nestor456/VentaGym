<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Request\AreaStoreRequest;
use Illuminate\Support\Facades\Gate;


class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('area.index'), 403);
        /*$datos['areas'] = Area::paginate(10);
        return view('area.index', $datos);*/
        $areas = Area::paginate(10);
        return view('area.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(Gate::denies('area.create'), 403);
        return view('area.create');
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
        $campos=[
            'Nombre'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);
        $validator = Validator::make(['Nombre' => $request->get('Nombre')], [
            'Nombre' => ' required|string|max:100|unique:areas',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'El area ya existe');
        } 

        $datosArea = request()->except('_token'); 
        Area::insert($datosArea);
        return redirect('area')->with('info','El are se creó con éxito');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        abort_if(Gate::denies('area.update'), 403);
        $area = Area::findOrFail($id);
        return view('area.edite', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);
        
        $validator = Validator::make(['Nombre' => $request->get('Nombre')], [
            'Nombre' => ' required|string|max:100|unique:areas',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'El area ya existe');
        } 

        $datosArea = request()->except(['_token','_method']);
        Area::where('id','=',$id)->update($datosArea);
        return redirect('area')->with('info','El rol se edito con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        abort_if(Gate::denies('area.destroy'), 403);
        Area::destroy($id);
        return redirect('area')->with('info','El rol se elimino con éxito');
    }
}
