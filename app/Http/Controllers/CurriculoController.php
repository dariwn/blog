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
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class CurriculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        abort(404, 'Página No Encontrada');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404, 'Página No Encontrada');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
               
        //expericencias
        $puestos = $request->puesto;
        //dd($puestos);
        if($puestos == null){
            $numero_puesto = 0;
               //echo "vacio";            
        }else{
            $numero_puesto = sizeof($puestos);

            $exp = array();
            for($contador = 0; $contador<$numero_puesto; $contador++){
                $keysPuestos["Puesto"] = $request->puesto[$contador];
                $keysPuestos["Empresa"] = $request->empresa[$contador];
                $keysPuestos["Actividades"] = $request->actividades_logros[$contador];
                $keysPuestos["Fecha_e"] = $request->fecha_entrada[$contador];
                $keysPuestos["Fecha_s"] = $request->fecha_salida[$contador]; 
                
                array_push($exp,$keysPuestos);
           
                }
               
            $result = json_encode($exp); //se guardara en json
            //leyendo json
            // $res = json_decode($result,true);
            // foreach ($res as $value) {
            //     $cadena = $value['Empresa'].'<br>';
            //     print ($cadena);
            //  }
        }
        //curso
        $cursos = $request->curso;
        //dd($request);
        if($cursos == null){
            $numero_curso = 0;
        }else{
            $numero_curso = sizeof($cursos);

            $cur = array();
            for($contacurso=0; $contacurso<$numero_curso; $contacurso++){
                $keysCursos['Curso'] = $request->curso[$contacurso];
                $keysCursos['Enlace'] = $request->enlace[$contacurso];
                $keysCursos['Descripcion'] = $request->descripcion[$contacurso];

                array_push($cur,$keysCursos);

            }

            $result1 = json_encode($cur);
            //leyendo json
            //  $res = json_decode($result1,true);
            //  foreach ($res as $value) {
            //      $cadena = $value['Curso'].'<br>';
            //      print ($cadena);
            //   }
        }
        $objetivo= $request->objetivo_puesto.':'.$request->objetivo_salario.':'.$request->objetivo_objetivo;
        $sepa = ":";
        $objetivosepa = explode($sepa,$objetivo);
        $jsonob = json_encode($objetivosepa);
        // print_r($jsonob);
        // $res = json_decode($jsonob,true);
        //      foreach ($res as $value) {
        //          $cadena = $value.'<br>';
        //          print ($cadena);
        //        }
        // dd($request);

        //maestrias/doctorados
        $maestrias = $request->escuela_maes;
        //dd($request);
        if($maestrias == null){
            $numero_maestrias = 0;
        }else{
            $numero_maestrias = sizeof($maestrias);

            $maestrias = array();
            for($contamaes=0; $contamaes<$numero_maestrias; $contamaes++){
                $keysMaestrias['Escuela'] = $request->escuela_maes[$contamaes];
                $keysMaestrias['Maestria'] = $request->nombre_maes[$contamaes];
                
                array_push($maestrias,$keysMaestrias);

            }

            $resultmaes = json_encode($maestrias);
            print_r($resultmaes);
            //leyendo json
            //   $res = json_decode($resultmaes,true);
            //   foreach ($res as $value) {
            //       $cadena = $value['Escuela'].'<br>';
            //       print ($cadena);
            //    }
        }
        //dd($request);

        $usuario = Auth::user()->id;
        $idi = implode(",",$request->ididioma); 

        
        $hola = new Curriculo;

        $hola->idegresado = $request->idegresado;
        $hola->ididioma = $idi;
        $hola->habilidades = $request->habilidades;
        $hola->especialidad = $request->especialidad;
        $hola->escuela = $request->escuela;
        $hola->fecha_inicio = $request->fecha_inicio;
        $hola->fecha_termino = $request->fecha_termino;
        $hola->area = $request->area;

        $hola->nivel_estudio = $request->nivel_estudios;
        if($numero_maestrias == 0){
            $hola->maestria_doctorado = " ";
        }else{
            $hola->maestria_doctorado = $resultmaes;
        }

        if($numero_puesto == 0){
            $hola->experiencia = " ";
        }else{
            $hola->experiencia = $result;
        }

        if($numero_curso == 0){
            $hola->curso = " ";
        }else{
            $hola->curso = $result1;
        }
        $hola->objetivo = $jsonob;
        $hola->duracion = $request->duracion;
        // $hola->idjerarquia = $request->idjerarquia;
        $hola->idestado = $request->idestado;
        $hola->idmunicipio = $request->idmunicipio;
        $perfil = DB::table('perfiles')->where('carrera', $request->area)->first();
        //dd($perfil->idperfiles);
        $hola->idperfiles = $perfil->idperfiles;
        $hola->save();
        $admin = DB::table('users')->where('id', $usuario)->update(['curriculo' => 0]);
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
        if(Auth::user()->origen == 'Egresado'){
        $usuario = Auth::user()->id;
        $egresado = Egresado::select('idegresado')->where('users_id', $usuario)->get()->pluck('idegresado');
        $egresados = Arr::flatten($egresado);

        //$hola = Curriculo::select('idcurriculo')->where('idcurriculo',$egresados)->get()->pluck('idcurriculo');
        //$holas = array_flatten($hola);

        $hola = Curriculo::select('idcurriculo')->where('idegresado',$egresados)->get()->pluck('idcurriculo');
        $holas = Arr::first($hola);
        
        $hola = Curriculo::find($holas);
        $egresados = Egresado::select('idegresado')->where('users_id', $usuario)->first();
        return view('curriculo.show',compact('holas', 'hola','egresados'));
        }else{
            abort(404, 'Pagina No Encontrada');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->origen == 'Egresado'){
            //$decode = Crypt::decryptString($id); 
            //dd($decode);  
             try {
                 $decode = Crypt::decryptString($id); 
                 //dd($decode);       
                 $versiarray = is_array($decode);
        
                 if($versiarray == true){
                     $id = $decode[0];
                 }else{
                     $id = $decode;
                 } 
               }catch (DecryptException $e) {
                 abort(404, 'Pagina No Encontrada');
              }
         //dd($id);    
        $usuario = Auth::user()->id;
        $egresados = Egresado::select('idegresado')->where('users_id', $usuario)->first();
        //$egresados = Arr::first($egresado);
        //dd($egresados);
/*
        $hola = Curriculo::select('idcurriculo')->where('idcurriculo',$egresados)->get()->pluck('idcurriculo');
        $holas = array_flatten($hola);*/
        $hola = DB::table('curriculo')->where('idegresado',$egresados->idegresado)->first();
        //dd($hola);
        
        $idiomas = Idioma::all();
        $jerarquias = Jerarquia::all();
        $perfiles = Perfil::all();
        $estados = Estado::all();
        $municipios = Municipio::all();

        //dd($hola->ididioma);
        $co = explode(",",$hola->ididioma);
        //dd($co);
        $co2= count($co);  
        return view("curriculo.editar",compact('co','co2','egresados','hola','idiomas','jerarquias','perfiles','estados','municipios','hola'));
        }else{
            abort(404, 'Pagina No Encontrada');
        }
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
        
        
        if(Auth::user()->origen == 'Egresado'){
        //dd($request);
        $puestos = $request->puesto;
        //dd($puestos);
        if($puestos == null){
            $numero_puesto = 0;
               //echo "vacio";            
        }else{
            $numero_puesto = sizeof($puestos);

            $exp = array();
            for($contador = 0; $contador<$numero_puesto; $contador++){
                $keysPuestos["Puesto"] = $request->puesto[$contador];
                $keysPuestos["Empresa"] = $request->empresa[$contador];
                $keysPuestos["Actividades"] = $request->actividades_logros[$contador];
                $keysPuestos["Fecha_e"] = $request->fecha_entrada[$contador];
                $keysPuestos["Fecha_s"] = $request->fecha_salida[$contador]; 
                
                array_push($exp,$keysPuestos);
           
                }
               
            $result = json_encode($exp); //se guardara en json
            //leyendo json
            // $res = json_decode($result,true);
            // foreach ($res as $value) {
            //     $cadena = $value['Empresa'].'<br>';
            //     print ($cadena);
            //  }
        }

        //curso
        $cursos = $request->curso;
        //dd($request);
        if($cursos == null){
            $numero_curso = 0;
        }else{
            $numero_curso = sizeof($cursos);

            $cur = array();
            for($contacurso=0; $contacurso<$numero_curso; $contacurso++){
                $keysCursos['Curso'] = $request->curso[$contacurso];
                $keysCursos['Enlace'] = $request->enlace[$contacurso];
                $keysCursos['Descripcion'] = $request->descripcion[$contacurso];

                array_push($cur,$keysCursos);

            }

            $result1 = json_encode($cur);
            //leyendo json
            //  $res = json_decode($result1,true);
            //  foreach ($res as $value) {
            //      $cadena = $value['Curso'].'<br>';
            //      print ($cadena);
            //   }
        }
        $objetivo= $request->objetivo_puesto.':'.$request->objetivo_salario.':'.$request->objetivo_objetivo;
        $sepa = ":";
        $objetivosepa = explode($sepa,$objetivo);
        $jsonob = json_encode($objetivosepa);
        // print_r($jsonob);
        // $res = json_decode($jsonob,true);
        //      foreach ($res as $value) {
        //          $cadena = $value.'<br>';
        //          print ($cadena);
        //        }
        // dd($request);

        //maestrias/doctorados
        $maestrias = $request->escuela_maes;
        //dd($request);
        if($maestrias == null){
            $numero_maestrias = 0;
        }else{
            $numero_maestrias = sizeof($maestrias);

            $maestrias = array();
            for($contamaes=0; $contamaes<$numero_maestrias; $contamaes++){
                $keysMaestrias['Escuela'] = $request->escuela_maes[$contamaes];
                $keysMaestrias['Maestria'] = $request->nombre_maes[$contamaes];
                
                array_push($maestrias,$keysMaestrias);

            }

            $resultmaes = json_encode($maestrias);
            print_r($resultmaes);
            //leyendo json
            //   $res = json_decode($resultmaes,true);
            //   foreach ($res as $value) {
            //       $cadena = $value['Escuela'].'<br>';
            //       print ($cadena);
            //    }
        }
        //dd($request);

        $hola = Curriculo::findOrFail($id);
        //dd($request->fecha_inicio);
        $idi = implode(",",$request->ididioma); 

        // $hola->idegresado = $request->idegresado;
        $hola->ididioma = $idi;
        $hola->habilidades = $request->habilidades;
        $hola->especialidad = $request->especialidad;
        $hola->escuela = $request->escuela;
        $hola->fecha_inicio = $request->fecha_inicio;
        $hola->fecha_termino = $request->fecha_termino;
        $hola->area = $request->area;

        $hola->nivel_estudio = $request->nivel_estudios;
        if($numero_maestrias == 0){
            $hola->maestria_doctorado = " ";
        }else{
            $hola->maestria_doctorado = $resultmaes;
        }

        if($numero_puesto == 0){
            $hola->experiencia = " ";
        }else{
            $hola->experiencia = $result;
        }
        
        if($numero_curso == 0){
            $hola->curso = " ";
        }else{
            $hola->curso = $result1;
        }
        $hola->objetivo = $jsonob;
        $hola->duracion = $request->duracion;
        // $hola->idjerarquia = $request->idjerarquia;
        $hola->idestado = $request->idestado;
        $hola->idmunicipio = $request->idmunicipio;
        $hola->idperfiles = $request->idperfiles;
        $hola->save();
        return redirect()->route('egresado.index');
        }else{
            abort(404, 'Pagina No Encontrada');
        }
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
        abort(404, 'Página No Encontrada');
    }

    public function curriculo(){
        if(Auth::user()->origen == 'Egresado'){
        $usuario = Auth::user()->id;
        $egresados = Egresado::select('idegresado')->where('users_id', $usuario)->first();
        //$egresados = Arr::first($egresado);
        //dd($egresados);
        $obtperfil=Egresado::select('perfiles_id')->where('idegresado', $egresados->idegresado)->get();
        

        $nomperfil=Perfil::select('carrera')->where('idperfiles',$obtperfil[0]->perfiles_id)->get();
        //dd($nomperfil);
        $idiomas = Idioma::all();
        $jerarquias = Jerarquia::all();
        $perfiles = Perfil::all();
        $estados = Estado::all();
        $municipios = Municipio::all();

        return view('curriculo.crear',compact('nomperfil','egresados','idiomas','jerarquias','estados','municipios','perfiles'));
        }else{
            abort(404, 'Pagina No Encontrada');
        }
    }

    
    public function getMunicipio(Request $request, $id){
        if($request->ajax()){
            $municipio = Municipio::municipios($id);
            return response()->json($municipio);
        }
    }

    public function Curriculopdf(){
        //creacion del pdf y guardado        
       $usuario = Auth::user()->id;
        
        $egresado = Egresado::select('idegresado')->where('users_id', $usuario)->get()->pluck('idegresado');
        $egresados = Arr::flatten($egresado);
 
        ////$hola = Curriculo::select('idcurriculo')->where('idcurriculo',$egresados)->get()->pluck('idcurriculo');
        ////$holas = array_flatten($hola);
 
        $hola = Curriculo::select('idcurriculo')->where('idegresado',$egresados)->get()->pluck('idcurriculo');
        $holas = Arr::first($hola);

        $image = Egresado::select('imagen')->where('idegresado',$egresados)->get();
        
        $hola = Curriculo::find($holas); 
           
        //dd($hola);
        $pdf = PDF::loadview('curriculo.curriculopdf',compact('holas', 'hola','egresados','image')); 
        
        return $pdf->stream('cv.pdf');
     }

}
