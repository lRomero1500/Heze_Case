<?php


namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class Usuarios extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract

{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $primaryKey = 'id_Usuarios';
    protected $table='cotz_usuarios';
    protected $fillable=['cod_Empleado','email','password','cod_Rol'];
    protected $hidden=['id_Usuarios','cod_Empleado',];
    public function empleados(){
        return $this->hasOne(Empleados::class,'cod_Empleado','cod_Empleado');
    }
    public function roles(){
        return $this->hasOne(Rol::class,'cod_Rol','cod_Rol');
    }
    public function detalle(){
        return $this->hasMany(RolDetalle::class,'cod_Rol','cod_Rol');
    }
}