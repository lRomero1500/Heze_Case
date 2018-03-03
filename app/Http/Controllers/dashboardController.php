<?php

namespace App\Http\Controllers;

use App\Models\Companias;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
    public function home(){
        $title_page='Dashboard';
        return view('dashborad/index',compact('title_page'));
    }

    public function clientes(){
        $title_page='Clientes';
        return view('dashborad/clientes',compact('title_page'));
    }
    public function empresas(){
        $title_page='Empresas';
        return view('dashborad/empresas',compact('title_page'));
    }
    public function colaboradores(){
        $title_page='Colaboradores';
        return view('dashborad/colaboradores',compact('title_page'));
    }
    public function cotizador(){
        $title_page='Dashboard';
        return view('dashborad/cotizador',compact('title_page'));
    }

    public function  CreatEditEmpresa(Request $request){
        $companias= new Companias();
        $companias->fill($request->all());
        $order=array('(',')','-');
        $companias->tel_Companias= str_replace($order,'',$companias->tel_Companias);
        try{
            $x=$companias->save();
            return response()->json([
                'msg'=>'La empresa '.$companias->nomb_Companias.' ha sido creada exitosamente!',
                'error'=>false
            ]);
        }
        catch (\Exception $e){
            return response()->json([
                'msg'=>'Error: '.$e,
                'error'=>true
            ]);
        }

    }

}
