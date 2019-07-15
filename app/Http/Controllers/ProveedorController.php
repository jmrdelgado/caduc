<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
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
        $cifprov = $request->get('searchcif');
        $rsocialprov = $request->get('searchrsocial');
        $regpagina = $request->get('regpag');
        
        //Listado Registros de Proveedores
        $proveedores = Proveedor::orderBy('id','ASC')
            ->SearchCif($cifprov)
            ->SearchRsocial($rsocialprov)
            ->paginate(3);
        
        return view('admin.providers.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Muestra la vista para llevar a cabo el alta de nuevos Proveedores
        return view('admin.providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validamos campo requerido
        $this->validate($request,['razonSocial'=>'required']);
        //Obtenemos datos del nuevo registro
        Proveedor::create($request->all());
        //Redireccionamos a listado de proveedores y mostramos mensaje
        return redirect()->route('proveedores.index')->with('success','Registro creado satisfactoriamente');
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
        //Obtenemos datos del registro indicado y Mostramos vista para edición
        $proveedores = Proveedor::find($id);
        return view('admin.providers.edit', compact('proveedores'));
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
        //Comprobamos que los campos requeridos existen
        $this->validate($request, ['razonSocial'=>'required']);
        
        //Actualizamos datos del registro modificado
        Proveedor::find($id)->update($request->all());
        return redirect()->route('proveedores.index')->with('success','Registro actualizado satisfactoriamente');
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
        $reg = Proveedor::findorfail($id);
        $reg->delete();
        return redirect()->route('proveedores.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
