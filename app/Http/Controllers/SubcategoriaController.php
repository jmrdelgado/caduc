<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
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
        //Obtenemos datos de los filtros aplicados
        $nomSubcat = $request->get('searchsubcategori');
        $nomCat = $request->get('searchcategori');

        //Obtenemos registros de Subcategorías con sus categorías
            $subcategorias = Subcategoria::query()
            ->join('categorias','subcategorias.idCategoriaFK','=','categorias.id')
            ->select('subcategorias.*','categorias.nomCategoria')
            ->where('nomSubcategoria','LIKE',"%$nomSubcat%")
            ->where('nomCategoria','LIKE',"%$nomCat%")
            ->orderBy('categorias.nomCategoria','ASC')
            ->paginate(3);

        //Mostramos vista principal de Subcategorías
        return view('admin.subcategories.index', compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obtenemos listado de categorías exitentes
        $categorias = Categoria::all()->sortBy('nomCategoria',false);
        //Mostramos Vista Alta Subcategorías
        return view('admin.subcategories.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Comprobamos datos requeridos del nuevo registro
        $this->validate($request, ['idCategoriaFK'=>'required']);
        $this->validate($request, ['nomSubcategoria' => 'required']);
        //Actualizamos en DBase datos del nuevo registro creado
        Subcategoria::create($request->all());
        //Retornamos a la vista principal
        return redirect()->route('subcategorias.index')->with('success','Registro creado satisfactoriamente');
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
        //Mostramos vista para edición de registro seleccionado
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::find($id);

        return view('admin.subcategories.edit',compact('categorias','subcategorias'));
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
        //Comprobamos datos requeridos del nuevo registro
        $this->validate($request, ['idCategoriaFK'=>'required']);
        $this->validate($request, ['nomSubcategoria' => 'required']);
        
        Subcategoria::find($id)->update($request->all());
        
        //Retornamos a la vista principal
        return redirect()->route('subcategorias.index')->with('success','Registro actualizado satisfactoriamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminamos registro solicitado
        $reg = Subcategoria::findorfail($id);
        $reg->delete();
        return redirect()->route('subcategorias.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
