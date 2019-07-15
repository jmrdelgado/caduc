<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'apellidos', 'email', 'password', 'estado', 'idRolFK',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * Consultas de búsqueda
     */
    public function scopeSearchName($query, $param) {
        if ($param) {
            return $query->where('name', 'LIKE', "%$param%");
        }
    }
    
    public function scopeSearchEmail($query, $param) {
        if ($param) {
            return $query->where('email', 'LIKE', "%$param%");
        }
    }
}
