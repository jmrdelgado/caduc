<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    /**
     * Desactivamos el uso de timestamped
     * @var boolean
     */
    public $timestamped = false;
    
    /**
     * Establecemos tabla y atributos asociados al modelo
     */
    protected $table = "subcategorias";
    protected $fillable = ["nomSubcategoria","idCategoriaFK"];
    
    /**
     * Establecemos relación muchos a uno con tabla categoria
     */
    public function categorias() {
        return $this->belongsTo("App\Categoria");
    }
    
    /**
     * Establecemos relación uno a muchos con tabla productos
     */
    public function productos() {
        return $this->hasMany("App/Producto","idSubcategoriaFK");
    }
    
    /**
     * Consultas de búsqueda
     */
    public function scopeSearchSubcategories($query, $param) {
        if ($param) {
            return $query->where('nomSubcategoria', 'LIKE', "%$param%");
        }
    }
}
