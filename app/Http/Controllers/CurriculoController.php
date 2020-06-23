<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Curriculo;
use App\Egresado;
use App\Idioma;
use DB;
use App\Jerarquia;
use App\Estado;
use App\Perfil;
use App\Municipio;
use Barryvdh\DomPDF\Facade as PDF;

class CurriculoController extends Controller
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
        $usuario = Auth::user()->id;
        $admin = DB::table('users')->where('id', $usuario)->update(['curriculo' => 0]);
        $hola = new Curriculo;
        $hola->idegresado = $request->idegresado;
        $hola->ididioma = $request->ididioma;
        $hola->habilidades = $request->habilidades;
        $hola->especialidad = $request->especialidad;
        $hola->escuela = $request->escuela;
        $hola->area = $request->area;
        if($request->experiencia == ""){
            $hola->experiencia = "Sin experiencia.";
        }else{
            $hola->experiencia = $request->experiencia;
        }
        
        $hola->duracion = $request->duracion;
        $hola->idjerarquia = $request->idjerarquia;
        $hola->idestado = $request->idestado;
        $hola->idmunicipio = $request->idmunicipio;
        $hola->idperfiles = $request->idperfiles;
        $hola->save();
        return redirect()->route('egresado.index');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Auth::user()->id;
        $egresado = Egresado::select('idegresado')->where('users_id', $usuario)->get()->pluck('idegresado');
        $egresados = array_flatten($egresado);

        //$hola = Curriculo::select('idcurriculo')->where('idcurriculo',$egresados)->get()->pluck('idcurriculo');
        //$holas = array_flatten($hola);

        $hola = Curriculo::select('idcurriculo')->where('idegresado',$egresados)->get()->pluck('idcurriculo');
        $holas = array_first($hola);
        
        $hola = Curriculo::find($holas);
        
        return view('curriculo.show',compact('holas', 'hola','egresados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Auth::user()->id;
        $egresado = Egresado::select('idegresado')->where('users_id', $usuario)->get()->pluck('idegresado');
        $egresados = array_first($egresado);
/*
        $hola = Curriculo::select('idcurriculo')->where('idcurriculo',$egresados)->get()->pluck('idcurriculo');
        $holas = array_flatten($hola);*/
        $hola = Curriculo::findOrFail($id);
       // dd($hola);
        
        $idiomas = Idioma::all();
        $jerarquias = Jerarquia::all();
        $perfiles = Perfil::all();
        $estados = Estado::all();
        $municipios = Municipio::all();

        return view("curriculo.editar",compact('egresados','hola','idiomas','jerarquias','perfiles','estados','municipios','hola'));
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
        $hola = Curriculo::findOrFail($id);
        $hola->idegresado = $request->idegresado;
        $hola->ididioma = $request->ididioma;
        $hola->habilidades = $request->habilidades;
        $hola->especialidad = $request->especialidad;
        $hola->escuela = $request->escuela;
        $hola->area = $request->area;
        if($request->experiencia == ""){
            $hola->experiencia = "Sin experiencia.";
        }else{
            $hola->experiencia = $request->experiencia;
        }
        $hola->duracion = $request->duracion;
        $hola->idjerarquia = $request->idjerarquia;
        $hola->idestado = $request->idestado;
        $hola->idmunicipio = $request->idmunicipio;
        $hola->idperfiles = $request->idperfiles;
        $hola->save();
        return redirect()->route('egresado.index');
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

    public function curriculo(){
        $usuario = Auth::user()->id;
        $egresado = Egresado::select('idegresado')->where('users_id', $usuario)->get()->pluck('idegresado');
        $egresados = array_first($egresado);

        $idiomas = Idioma::all();
        $jerarquias = Jerarquia::all();
        $perfiles = Perfil::all();
        $estados = Estado::all();
        $municipios = Municipio::all();

        return view('curriculo.crear',compact('egresados','idiomas','jerarquias','estados','municipios','perfiles'));
    }

    
    public function getMunicipio(Request $request, $id){
        if($request->ajax()){
            $municipio = Municipio::municipios($id);
            return response()->json($municipio);
        }
    }

    public function curriculopdf(){
        //creacion del pdf y guardado        
        $usuario = Auth::user()->id;
        $egresado = Egresado::select('idegresado')->where('users_id', $usuario)->get()->pluck('idegresado');
        $egresados = array_flatten($egresado);
 
        //$hola = Curriculo::select('idcurriculo')->where('idcurriculo',$egresados)->get()->pluck('idcurriculo');
        //$holas = array_flatten($hola);
 
        $hola = Curriculo::select('idcurriculo')->where('idegresado',$egresados)->get()->pluck('idcurriculo');
        $holas = array_first($hola);
        
        $hola = Curriculo::find($holas); 
           
    
        $pdf = PDF::loadview('curriculo.curriculopdf',compact('holas', 'hola','egresados')); 
        //return $pdf->download('Denuncia.pdf');
        return $pdf->stream('cv.pdf');
     }

}
