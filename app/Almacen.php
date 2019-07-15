<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    //Especificamos Tabla
    protected $table = 'almacenes';
    protected $fillable = ["nomAlmacen","direccion","telefono","cpostal","provincia"];
    
    //Establecemos Relación Uno a Muchos
    public function lineadistribucion() {
        return $this->hasMany("App/LineaDistribucion","idAlmacenFK");
    }
    
    //Consultas de búsqueda
    public function scopeSearchAlmacen($query, $param) {
        if ($param) {
            return $query->where('nomAlmacen','LIKE',"%$param%");
        }
    }
    
    public function scopeSearchProvincia($query, $param) {
        if ($param) {
            return $query->where('provincia','LIKE',"%$param%");
        }
    }
}
