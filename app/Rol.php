<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    /**
     * Desactivamos el uso de timestamped
     * @var boolean
     */
    public $timestamped = false;
    
    //Establecemos Tabla y Campos del modelo
    protected $table = "roles";
    protected $fillable = ["tipoRol","categorias","subcategorias","productos","almacenes","proveedores","usuarios","roles"];
    
    /**
     * Función scope para busquedas
     */
    public function scopeSearchRol($query, $param) {
        if ($param){
            return $query->where("tipoRol","LIKE","%$param%");
        }
    }
    
    /**
     * Establecemos relación Roles Usuarios
     */
    public function users(){
        return $this->hasMany("App\User","idRolFK");
    }
}
