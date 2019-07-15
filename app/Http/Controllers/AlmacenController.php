<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Almacen;

class AlmacenController extends Controller
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
        //Obtenemos valores de busqueda
        $alm = $request->get("searchalmacen");
        $prov = $request->get("searchprovincia");
        //Establecemos vista principal
        $almacenes = Almacen::orderBy('nomAlmacen','ASC')
            ->SearchAlmacen($alm)
            ->SearchProvincia($prov)
            ->paginate(3);
        
        return view('admin.warehouse.index', compact('almacenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Establecemos Vista Alta Almacenes
        return view('admin.warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validamos campos requeridos
        $this->validate($request,['nomAlmacen'=>'required']);
        //Obtenemos datos Alta de Nuevo Almacen
        Almacen::create($request->all());
        //Redireccionamos al listado general de Almacenes
        return redirect()->route('almacenes.index')->with('success','Registro creado satisfactoriamente');
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
        //Obtenermos Identificador de Registro a Modificar
        $almacenes = Almacen::find($id);
        //Establecemos Vista para Edición
        return view('admin.warehouse.edit', compact('almacenes'));
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
        //Validamos campos requeridos
        $this->validate($request,['nomAlmacen'=>'required']);
        //Actualizamos datos del registro modificado
        Almacen::find($id)->update($request->all());
        return redirect()->route('almacenes.index')->with('success','Registro actualizado satisfactoriamente');
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
        $reg = Almacen::findOrFail($id);
        $reg->delete();
        return redirect()->route('almacenes.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
