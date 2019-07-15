<?php

namespace App\Http\Controllers;

use App\Rol;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Obtenemos datos de los filtros aplicados
        $nomUser = $request->get('searchname');
        $correo = $request->get('searchemail');
        
        //Listado Registros de Usuarios
        $usuarios = User::orderBy('id','ASC')
        ->SearchName($nomUser)
        ->SearchEmail($correo)
        ->paginate(3);
        
        //Mostramos vista principal de Subcategorías
        return view('auth.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obtenemos listado de categorías exitentes
        $permisos = Rol::all()->sortBy('tipoRol',false);
        //Mostramos Vista Alta Subcategorías
        return view('auth.register', compact('permisos'));
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
        //Mostramos vista para edición de registro seleccionado
        $usuarios = User::find($id);
        $permisos = Rol::all();
        
        return view('auth.edit',compact('usuarios','permisos'));
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
        $this->validate($request, ['name'=>'required']);
        $this->validate($request, ['email'=>'required']);
        $this->validate($request, ['idRolFK'=>'required']);
        
        if(!isset($request['estado'])){
            $request['estado'] = 0;
        }
        
        User::find($id)->update($request->all());
        
        //Retornamos a la vista principal
        return redirect()->route('usuarios.index')->with('success','Registro actualizado satisfactoriamente'); 
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
        $reg = User::findorfail($id);
        $reg->delete();
        return redirect()->route('usuarios.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
