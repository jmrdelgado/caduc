<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    public $timestamps = false;
    
    /**
     * Establecemos tabla y atributos asociados al modelo
     */
    protected $table = "proveedores";
    protected $fillable = ["cif","razonSocial","direccion","telefono","email","cpostal","ciudad"];
    
    /**
     * Establecemos relación uno a muchos con tabla lineaproveedores
     */
    public function lineaproveedores() {
        return $this->hasMany("App\LineaProveedor");
    }
    
    /**
     * Consultas de búsqueda
     */
    public function scopeSearchCif($query, $param) {
        if ($param) {
            return $query->where('cif', 'LIKE', "%$param%");
        }
    }
    
    public function scopeSearchRsocial($query, $param) {
        if ($param) {
            return $query->where('razonSocial', 'LIKE', "%$param%");
        }
    }
    
}
