<?php

namespace App\Http\Controllers;

use App\Models\Companias;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class companiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title_page = 'Mantenimiento de Compañias';
        $Companias = Companias::all();
        return view('empresas/credtEmpresasnoEMB')->with([
            'title_page' => $title_page,
            'Companias' => $Companias
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companias = new Companias();
        $companias->fill($request->all());
        $order = array('(', ')', '-');
        $companias->tel_Companias = str_replace($order, '', $companias->tel_Companias);
        try {
            if ($companias->cod_Companias == '0') {
                $x = $companias->save();
                return response()->json([
                    'msg' => 'La empresa ' . $companias->nomb_Companias . ' ha sido creada exitosamente!',
                    'error' => false
                ]);
            } else {
                $CompaniasUp = Companias::find($companias->cod_Companias);
                $CompaniasUp->nomb_Companias=$companias->nomb_Companias;
                $CompaniasUp->nit_Companias=$companias->nit_Companias;
                $CompaniasUp->tel_Companias=$companias->tel_Companias;
                $CompaniasUp->direccion_companias=$companias->direccion_companias;
                $CompaniasUp->logo_companias=$companias->logo_companias;
                $CompaniasUp->correo_companias=$companias->correo_companias;
                $CompaniasUp->save();
                $dat=Companias::all();
                return response()->json([
                    'msg' => 'La empresa ' . $companias->nomb_Companias . ' se modifico  exitosamente!',
                    'error' => false,
                    'table'=>$dat
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'msg' => 'Error: ' . $e,
                'error' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Companias::find($id);
        return \Response::json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $companias=Companias::find($id);
            Companias::destroy($id);
            return response()->json([
                'msg' => 'La empresa ' . $companias->nomb_Companias . ' se eliminó correctamente!',
                'error' => false
            ]);
        }
        catch (Exception $e){
            return response()->json([
                'msg' => 'Error! '. $e->getMessage(),
                'error' => true
            ]);

        }
    }
}
