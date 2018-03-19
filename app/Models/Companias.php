<?php
/**
 * Created by PhpStorm.
 * User: luisd
 * Date: 15/10/2017
 * Time: 4:55 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companias extends Model
{
    protected $primaryKey = 'cod_Companias';

    protected $table = 'cotz-companias';
    protected $fillable = ['cod_Companias','nomb_Companias', 'nit_Companias', 'tel_Companias', 'direccion_companias',
        'logo_companias'];
   /* protected $hidden = ['cod_Companias',];*/

}