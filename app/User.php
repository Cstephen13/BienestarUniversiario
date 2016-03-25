<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['primernombre','segundonombre','codigo','primerapellido','segundoapellido','email', 'password','rol_id','iniciodesesion','estado'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    public function Rol(){
        return $this->belongsTo('App\Rol');
    }
    public function ModuloUsuarios(){
        $rol = $this->Rol;
        if($rol->registrarusuarios){
            return true;
        }else{
            return false;
        };
    }
    public function scopeCodigo($query,$codigo){
        if($codigo != ""){
        $query->where('codigo','like',$codigo.'%');
        }
    }
    public function scopeEstado($query,$codigo,$estado){
        if($codigo != ""){
            $query->where('codigo','like',$codigo.'%')->where('estado','0');
        }else{
            $query->where('estado','0');
        }
    }
}

