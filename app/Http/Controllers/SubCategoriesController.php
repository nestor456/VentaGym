<?php

namespace App\Http\Controllers;

use App\Models\Subcategories;
use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategories::paginate(15); 
        return view('categorias.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('categorias.subcategory.create', compact('categories'));
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
            'category_id'=>'required',
            'name'=>'required|string|max:100',
            'description'=>'required|string|max:100',                                    
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        Subcategories::create($request->all()+[
            'fecha_creacion'=>Carbon::now('America/lima'),
        ]);

        return redirect('subcategories')->with('info','La Sub Categoria se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sub_categories  $sub_categories
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategories $sub_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sub_categories  $sub_categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subcategorie = Subcategories::findOrFail($id);
        $categories = Categories::get();
        //dd($categories);
        return view('categorias.subcategory.edite', compact('categories','subcategorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sub_categories  $sub_categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'category_id'=>'required',
            'name'=>'required|string|max:100',
            'description'=>'required|string|max:100',                                    
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $subcategories = request()->except(['_token','_method']);
        Subcategories::where('id','=',$id)->update($subcategories);
        return redirect('subcategories')->with('info','La Sub Categoria se edito con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sub_categories  $sub_categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subcategories::destroy($id);
        return redirect('subcategories')->with('info','La Sub Categoria se elimino con éxito');
    }
}
