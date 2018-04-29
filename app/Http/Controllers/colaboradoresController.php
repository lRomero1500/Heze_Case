<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class colaboradoresController extends Controller
{
    public function index()
    {
        $title_page = 'Mantenimiento de Colaboradores';
        $Colaboradores = Empleados::all();
        return view('colaboradores/credtColaboradoresnoEMB')->with([
            'title_page' => $title_page,
            'Colabors' => $Colaboradores
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
        $clbrdrs = new Empleados();
        $clbrdrs->fill($request->all());
        /*$order = array('(', ')', '-');
        $clbrdrs->tel_Companias = str_replace($order, '', $clbrdrs->tel_Companias);
        try {
            if ($companias->cod_Companias == '0') {
                $x = $companias->save();
                $dat = Companias::all();
                return response()->json([
                    'msg' => 'La empresa ' . $companias->nomb_Companias . ' se creo  exitosamente!',
                    'error' => false,
                    'table' => $dat
                ]);
            } else {
                $CompaniasUp = Companias::find($companias->cod_Companias);
                $CompaniasUp->nomb_Companias = $companias->nomb_Companias;
                $CompaniasUp->nit_Companias = $companias->nit_Companias;
                $CompaniasUp->tel_Companias = $companias->tel_Companias;
                $CompaniasUp->direccion_companias = $companias->direccion_companias;
                $CompaniasUp->logo_companias = $companias->logo_companias;
                $CompaniasUp->correo_companias = $companias->correo_companias;
                $CompaniasUp->save();
                $dat = Companias::all();
                return response()->json([
                    'msg' => 'La empresa ' . $companias->nomb_Companias . ' se modifico  exitosamente!',
                    'error' => false,
                    'table' => $dat
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'msg' => 'Error: ' . $e,
                'error' => true
            ]);
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Empleados::find($id);
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
        try {
            $companias = Companias::where('cod_Companias', $id)->first();;
            if($companias){
                Companias::destroy($id);
                $dat=Companias::all();
                return response()->json([
                    'msg' => 'La empresa ' . $companias->nomb_Companias . ' se eliminó correctamente!',
                    'error' => false,
                    'table'=>$dat
                ]);
            }
            else{
                return response()->json([
                    'msg' => 'La empresa ' . $companias->nomb_Companias . ' no existe!',
                    'error' => true
                ]);
            }


        } catch (Exception $e) {
            return response()->json([
                'msg' => 'Error! ' . $e->getMessage(),
                'error' => true
            ]);

        }
    }
}
