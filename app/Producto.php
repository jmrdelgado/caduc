<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    
    //Indicamos tabla y campos
    protected $table = "productos";
    protected $fillable = ["nomProducto","descripcion","precioCosto","fechaCaducidad","existencias","idSubcategoriaFK"];
    
    //Realizamos conversión de fechas
    protected $dates = ['fechaCaducidad'];
    
    //Establecemos relación mucho a uno con tabla subcategorías
    public function subcategorias() {
        return $this->belongsTo("App/Subcategoria");
    }
    
    //Creación de consultas scope
}
