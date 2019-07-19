<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    
    //Indicamos tabla y campos
    protected $table = "productos";
    protected $fillable = ["nomProducto","descripcion","precioCosto","fechaCaducidad","existencias","idSubcategoriaFK"];
    
    //Establecemos relación mucho a uno con tabla subcategorías
    public function subcategorias() {
        return $this->belongsTo("App/Subcategoria");
    }
    
    //Creación de consultas scope
}
