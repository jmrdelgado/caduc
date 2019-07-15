<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{  
    public $timestamps = false;
    
    /**
     * Establecemos tabla y atributos asociados al modelo
     */
    protected $table = "categorias";
    protected $fillable = ["nomCategoria"];
    
    /**
     * Establecemos relación uno a muchos con tabla subcategoria
     */
    public function subcategorias() {
        return $this->hasMany("App\Subcategoria","idCategoriaFK");
    }
    
    /**
     * Consultas de búsqueda
     */
    public function scopeSearchCategories($query, $cat) {
        if ($cat) {
            return $query->where('nomCategoria', 'LIKE', "%$cat%");
        }
    }
}
