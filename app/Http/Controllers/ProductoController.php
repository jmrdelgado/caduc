<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Subcategoria;
use Illuminate\Http\Request;

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
    public function index()
    {
        $productos = Producto::orderBy('nomProducto','ASC')
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
        //Muestra la vista para llevar a cabo el alta de nuevos Productos
        return view('admin.products.create');
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
        $reg['fechaCaducidad'] = date('Y-d-m', strtotime($reg['fechaCaducidad']));
        
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
    }
}
