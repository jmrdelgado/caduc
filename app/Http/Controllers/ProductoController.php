<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductoController extends Controller
{
    
    /**
     * Constructor que protege ruta
     * a usuarios logados
     */
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Recogemos valores de busqueda
        $prodbusca = $request->get('searchproducto');
        $fechabusca = $request->get('searchfechaproducto');
        
        $productos = Producto::orderBy('nomProducto','ASC')
        ->SearchProducto($prodbusca)
        ->SearchFecha($fechabusca)
        ->paginate(3);

        return view('admin.products.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategorias = Subcategoria::all()->sortBy('nomSubcategoria',false);
        //Muestra la vista para llevar a cabo el alta de nuevos Productos
        return view('admin.products.create', compact('subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Realizamos validación de datos requeridos
        $this->validate($request, ["nomProducto" => "required"]);
        $this->validate($request, ["fechaCaducidad" => "required"]);
        $this->validate($request, ["existencias" => "required"]);
        $this->validate($request, ["idSubcategoriaFK" => "required"]);
        
        $reg = $request->all();
        $reg['fechaCaducidad'] = date('Y-m-d', strtotime($reg['fechaCaducidad']));
        
        Producto::create($reg);
        
        return redirect()->route('productos.index')->with('success','Registro creado satisfactoriamente');;
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
        //Obtenemos todas las subcategorías existentes
        $subcategorias = Subcategoria::all();
        //Obtenemos datos del registro indicado y Mostramos vista para edición
        $productos = Producto::find($id);
        return view('admin.products.edit', compact('subcategorias','productos'));
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
        //Realizamos validación de datos requeridos
        $this->validate($request, ["nomProducto" => "required"]);
        $this->validate($request, ["fechaCaducidad" => "required"]);
        $this->validate($request, ["existencias" => "required"]);
        $this->validate($request, ["idSubcategoriaFK" => "required"]);

        //Actualizamos datos del producto solicitado
        $reg = $request->all();
        $reg['fechaCaducidad'] = date('Y-m-d', strtotime($reg['fechaCaducidad']));
        
        Producto::find($id)->update($reg);
        
        //Retornamos a la vista principal de productos
        return redirect()->route('productos.index')->with('success','Registro actualizado satisfactoriamente');
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
        $delproducto = Producto::findOrFail($id);
        $delproducto->delete();
        return redirect()->route('productos.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
