<?php


namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract

{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $primaryKey = 'cod_Empleado';

    protected $table='Cotz_Empleados';
    protected $fillable=['documentoEmpleado','tipo_Doc_Empleado','nombre_Empleado','sexo_Empleado','fecha_Nac_Empleado',
                        'telf_Celular_Empleado','telf_Corporativo_Empleado','email','cod_Companias',
                        'porc_Descuento','porc_Ganacia','password'];
    protected $hidden=['cod_Empleado',];


}