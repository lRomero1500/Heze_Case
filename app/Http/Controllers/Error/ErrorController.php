<?php
/**
 * Created by PhpStorm.
 * User: luisd
 * Date: 13/10/2017
 * Time: 1:57 PM
 */

namespace App\Http\Controllers\Error;
use App\Models\Empleados;
use App\Models\Menu;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ErrorController extends Controller
{
    public function index()
    {
        $title_page='Error';
        return view('errors/503',compact('title_page'));
    }
}