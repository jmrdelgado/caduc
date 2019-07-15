<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
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
        //Implementamos busqueda de usuarios por tipo de rol
        $buscaRol = $request->get("searchrol");
        
        //Obtenemos registros existentes
        $permisos = Rol::orderBy('tipoRol','ASC')
            ->SearchRol($buscaRol)
            ->paginate(3);

        //Mostramos vista principal de Roles y Permisos
        return view("admin.roles.index", compact("permisos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Muestra la vista para llevar a cabo el alta de nuevos Roles
        return view('admin.roles.create');
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
        $this->validate($request,['tipoRol'=>'required']);
        //Obtenemos datos del nuevo registro
        Rol::create($request->all());
        //Redireccionamos a listado de proveedores y mostramos mensaje
        return redirect()->route('roles.index')->with('success','Registro creado satisfactoriamente');
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
        //Buscamos registro a editar
        $permisos = Rol::find($id);
        return view("admin.roles.edit", compact("permisos"));
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
        //Comprobamos campos requeridos
        $this->validate($request, ["tipoRol"=>"required"]);

        $datarol = $request->all();

        //Comprobamos datos de los ckeckbox y actualizamos valores
        if(!isset($datarol['categorias'])){
            $datarol['categorias'] = 0;
        }
        
        if(!isset($datarol['subcategorias'])){
            $datarol['subcategorias'] = 0;
        }
        
        if(!isset($datarol['productos'])){
            $datarol['productos'] = 0;
        }
        
        if(!isset($datarol['almacenes'])){
            $datarol['almacenes'] = "0";
        }
        
        if(!isset($datarol['proveedores'])){
            $datarol['proveedores'] = "0";
        }
        
        if(!isset($datarol['usuarios'])){
            $datarol['usuarios'] = "0";
        }
        
        if(!isset($datarol['roles'])){
            $datarol['roles'] = "0";
        }

        //Actualizamos valores del registro modificado
        //dd($datarol);
        $regrol = Rol::find($id);
        $regrol->tipoRol = $datarol['tipoRol'];
        $regrol->categorias = $datarol['categorias'];
        $regrol->subcategorias = $datarol['subcategorias'];
        $regrol->productos = $datarol['productos'];
        $regrol->almacenes = $datarol['almacenes'];
        $regrol->proveedores = $datarol['proveedores'];
        $regrol->usuarios = $datarol['usuarios'];
        $regrol->roles = $datarol['roles'];
        $regrol->save();
        
        return redirect()->route("roles.index")->with("success","Registro actualizado satisfactoriamente");
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
        $reg = Rol::findorfail($id);
        $reg->delete();
        return redirect()->route('roles.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
