<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
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
        //Obtenemos Total de Categorías disponibles ordenadas de forma descendente por el id
        $categori = $request->get("searchcategori");
        
        $categorias = Categoria::orderBy('nomCategoria','ASC')
            ->searchcategories($categori)
            ->paginate(3);
        
        return view('admin.categories.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
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
        $this->validate($request,[ 'nomCategoria'=>'required']);
        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success','Registro creado satisfactoriamente');
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
        $categorias = Categoria::find($id);
        return view('admin.categories.show',compact('categorias'));
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
        $categorias = Categoria::find($id);
        return view('admin.categories.edit',compact('categorias'));
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
        $this->validate($request,[ 'nomCategoria'=>'required' ]);
        
        Categoria::find($id)->update($request->all());
        return redirect()->route('categorias.index')->with('success','Registro actualizado satisfactoriamente');
        
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
        $cat = Categoria::findorFail($id);
        $cat->delete();
        return redirect()->route('categorias.index')->with('success','Registro eliminado satisfactoriamente');     
    }
}
