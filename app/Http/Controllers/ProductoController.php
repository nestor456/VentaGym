<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categories;
use App\Models\Subcategories;
use App\Models\provides;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::paginate(10);
        $details = [];
        foreach($productos as $producto){
            $categorie = Categories::find($producto->idcategoria);
            $subcategorie = Subcategories::find($producto->idsubcategoria);
            $provide = provides::find($producto->idproveedor);

            $details[] = [
                'id'=> $producto->id,
                'NombreProducto'=> $producto->NombreProducto,
                'categoria'=> $categorie->name,
                //'subcategoria'=> $subcategorie->name,
                'proveedor'=> $provide->razon_social,
                'Detalle'=> $producto->Detalle,
                'stock'=> $producto->stock,
                'precio'=> $producto->precio
            ];
        };

        //dd($details);

        return view('producto.index', compact('productos','details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::get();
        $provides = provides::get();
        return view('producto.create', compact('categories','provides'));
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
            'NombreProducto' => 'required|string|max:100',
            'Detalle' => 'required|string|max:100',
            'stock' => 'integer',
            'precio' => 'required',
        ]; 
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request, $campos, $mensaje);*/

        $datosProducto = request()->except('_token'); 

        Producto::create($datosProducto);
        return redirect('producto')->with('info','El producto se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto = Producto::findOrFail($id);
        return view('producto.edite', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'NombreProducto' => 'required|string|max:100',
            'Detalle' => 'required|string|max:100',
            'stock' => 'integer',
            'precio' => 'required',
        ]; 
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request, $campos, $mensaje);

        $datosProducto = request()->except(['_token','_method']);
        Producto::where('id','=',$id)->update($datosProducto);
        return redirect('producto')->with('info','El producto se edito con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Producto::destroy($id);
        return redirect('producto')->with('info','El producto se elimino con éxito');
    }

    public function bySubCategory($id){

        $data = Subcategories::where('category_id','=',$id)->get();
        return response()->json($data, 200);        
    }
}
