<?php

namespace App\Http\Controllers;

use App\Models\provides;
use App\Models\Document;
use App\Models\Gender;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProvidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provides = provides::paginate(15); 
        return view('provides.index', compact('provides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documents = Document::all();
        $genders = Gender::all();
        return view('provides.create', compact('documents','genders'));
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
            'razon_social'=>'required|string|max:100',
            'ruc'=>'required|string|max:10',
            'rubro'=>'required|string|max:100',
            'categoria'=>'required|string|max:100',
            'pagina_web'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'departamento'=>'required|string|max:100',
            'provincia'=>'required|string|max:100',
            'distrito'=>'required|string|max:100',
            'nombres'=>'required|string|max:100',
            'apellidos'=>'required|string|max:100',
            'tipo_doc'=>'required|string|max:100',
            'number_doc'=>'required|string|max:10',
            'genero'=>'required|string|max:100',
            'telefono'=>'required|string|max:9',
            'correo'=>'required|email',                        
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        provides::create($request->all()+[
            'fecha_creacion'=>Carbon::now('America/lima'),
        ]);

        return redirect('provides')->with('info','El Proveedor se creó con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\provides  $provides
     * @return \Illuminate\Http\Response
     */
    public function show(provides $provides)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\provides  $provides
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provide = provides::findOrFail($id);
        $documents = Document::all();
        $genders = Gender::all();
        return view('provides.edite', compact('provide','documents','genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\provides  $provides
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'razon_social'=>'required|string|max:100',
            'ruc'=>'required|string|max:10',
            'rubro'=>'required|string|max:100',
            'categoria'=>'required|string|max:100',
            'pagina_web'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'departamento'=>'required|string|max:100',
            'provincia'=>'required|string|max:100',
            'distrito'=>'required|string|max:100',
            'nombres'=>'required|string|max:100',
            'apellidos'=>'required|string|max:100',
            'number_doc'=>'required|string|max:10',
            'telefono'=>'required|string|max:9',
            'correo'=>'required|email',                        
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosprovide = request()->except(['_token','_method']);

        provides::where('id','=',$id)->update($datosprovide);
        return redirect('provides')->with('info','El proveedor se edito con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\provides  $provides
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        provides::destroy($id);
        return redirect('provides')->with('info','El Proveedor se elimino con éxito');
    }
}
