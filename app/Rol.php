<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name','registrarusuarios'];
    public function Usuarios(){
        return $this->hasMany('App\Rol');
    }
}
