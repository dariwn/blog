<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitudperfil;
use Auth;
use App\Empresa;
use App\Solicitud;
use App\Perfil;
use DB;

class SolicitudperfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $hola = Solicitudperfil::all()->where('idsolicitud',$id)->first();

        $usuario = Auth::user()->id;
        $empresa = Empresa::select('idempresa')->where('users_id', $usuario)->get()->pluck('idempresa');
        $empresas = array_first($empresa);

        $bienvenido = Solicitud::where('idsolicitud',$id)->first();

        $solici = Solicitud::select('idsolicitud')->where('idsolicitud',$id)->get()->pluck('idsolicitud');
        $sola = array_first($solici);

        $perfiles = Perfil::all();
        $salu = Solicitud::all();
        $Lista = array();
        foreach($perfiles as $key=>$val){
            $Lista[$key] = $val;
            $array = Solicitudperfil::where('idsolicitud',$id)->where('idperfiles',$val['idperfiles'])->first();
            if(!empty($array)){
                $Lista[$key]->checked = 'checked';
            }else{
                $Lista[$key]->checked = '';
            }
        }
        return view('bienvenido.editar',compact('perfiles','empresas','sola','hola','salu','bienvenido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!empty($request->idperfiles)){
            $hola = Solicitudperfil::find($id);
            $hola->idsolicitud = $request->idsolicitud;
            $hola->idperfiles = $request->idperfiles;
        }
        return redirect()->route('solicitud.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
