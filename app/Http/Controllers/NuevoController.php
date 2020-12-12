<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Auth;
use App\Solicitudperfil;
use App\Empresa;
use App\Egresado;
use DB;
use App\Solicitud;

class NuevoController extends Controller
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
        $empresa = Empresa::paginate(7);
        return view('administradora.listado', compact('empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nuevo.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevo = new User;
        $nuevo->password = bcrypt($request->password);
        $nuevo->username = $request->get('username');
        $nuevo->tipo = "1";
        $nuevo->curriculo = "0";
        $nuevo->origen = "Empresa";
        $nuevo->save();
        return back();
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
        abort(404, 'Página No Encontrada');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        abort(404, 'Página No Encontrada');
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
        //
        abort(404, 'Página No Encontrada');
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

    public function ver(){
        $administrador = Empresa::paginate(7);
        return view('administradora.ver', compact('administrador'));
    }

    public function graficaPastel(){
        $a = Solicitudperfil::where('idperfiles', 1)->count();
        $b = Solicitudperfil::where('idperfiles', 2)->count();
        $c = Solicitudperfil::where('idperfiles', 3)->count();
        $d = Solicitudperfil::where('idperfiles', 4)->count();
        $e = Solicitudperfil::where('idperfiles', 5)->count();
        $f = Solicitudperfil::where('idperfiles', 6)->count();
        $g = Solicitudperfil::where('idperfiles', 7)->count();
        $h = Solicitudperfil::where('idperfiles', 8)->count();
        $i = Solicitudperfil::where('idperfiles', 9)->count();
        $j = Solicitudperfil::where('idperfiles', 10)->count();
        $k = Solicitudperfil::where('idperfiles', 11)->count();
        $m = Solicitudperfil::where('idperfiles', 12)->count();
        $n = Solicitudperfil::where('idperfiles', 13)->count();
        return view('administradora.pastel',compact('a','b','c','d','e','f','g','h','i','j','k','m','n'));        
    }

    public function graficaBarra(){
        // $a = Solicitudperfil::where('idperfiles', 1)->count();
        // $b = Solicitudperfil::where('idperfiles', 2)->count();
        // $c = Solicitudperfil::where('idperfiles', 3)->count();
        // $d = Solicitudperfil::where('idperfiles', 4)->count();
        // $e = Solicitudperfil::where('idperfiles', 5)->count();
        // $f = Solicitudperfil::where('idperfiles', 6)->count();
        // $g = Solicitudperfil::where('idperfiles', 7)->count();
        // $h = Solicitudperfil::where('idperfiles', 8)->count();
        // $i = Solicitudperfil::where('idperfiles', 9)->count();
        // $j = Solicitudperfil::where('idperfiles', 71)->count();
        // $k = Solicitudperfil::where('idperfiles', 72)->count();
        // $m = Solicitudperfil::where('idperfiles', 91)->count();
        // $n = Solicitudperfil::where('idperfiles', 92)->count();
        // return view('administradora.barra', compact('a','b','c','d','e','f','g','h','i','j','k','m','n'));

        return view('administradora.periodografica');
    }

    public function grafica(Request $request){
        //dd($request);
        $a= 0;
        $b= 0;
        $c= 0;
        $d= 0;
        $e= 0;
        $f= 0;
        $g= 0;
        $h= 0;
        $i= 0;
        $j= 0;
        $k= 0;
        $m= 0;
        $n= 0;
       
        if($request->tipo == 1){
            //dd($request->periodo);
            $periodoinicio = $request->periodo;
            $periodofin = $request->hasta;
            //dd($periodofin); SELECT `idperfiles` FROM `solicitudperfil` WHERE `created_at` BETWEEN '2020-09-01' AND '2020-09-20'
            $solicitudper = Solicitudperfil::select('idperfiles')->whereBetween('created_at',array($periodoinicio,$periodofin))->get();
            //dd($solicitudper);
            foreach($solicitudper as $perfil){
                if($perfil->idperfiles == 1){
                    $a = $a+1;
                }
                if($perfil->idperfiles == 2){
                    $b = $b+1;
                }
                if($perfil->idperfiles == 3){
                    $c = $c+1;
                }
                if($perfil->idperfiles == 4){
                    $d = $d+1;
                }
                if($perfil->idperfiles == 5){
                    $e = $e+1;
                }
                if($perfil->idperfiles == 6){
                    $f = $f+1;
                }
                if($perfil->idperfiles == 7){
                    $g = $g+1;
                }
                if($perfil->idperfiles == 8){
                    $h = $h+1;
                }
                if($perfil->idperfiles == 9){
                    $i = $i+1;
                }
                if($perfil->idperfiles == 71){
                    $j = $j+1;
                }
                if($perfil->idperfiles == 72){
                    $k = $k+1;
                }
                if($perfil->idperfiles == 91){
                    $m = $m+1;
                }
                if($perfil->idperfiles == 92){
                    $n = $n+1;
                }
            }                                    
            return view('administradora.barra', compact('a','b','c','d','e','f','g','h','i','j','k','m','n','periodoinicio','periodofin'));
        }        
        if($request->tipo == 2){
            
            $periodoinicio = $request->periodo;
            $periodofin = $request->hasta;
            $puestosocu= Solicitud::select('respuesta')->whereBetween('created_at',array($periodoinicio,$periodofin ))->get();
            
            //dd($puestosocu);
            foreach($puestosocu as $res){
                if($res->respuesta == 'SI'){
                    $a = $a + 1;
                }
                if($res->respuesta == 'NO'){
                    $b = $b + 1;
                }
            }           
        
            return view('administradora.grafialumnosb',compact('a','b','periodoinicio','periodofin'));
        }
    }

    public function graficaAlumnosp(){
        $a = Solicitud::where('respuesta', 'SI')->count();
        $b = Solicitud::where('respuesta', 'NO')->count();
        
        return view('administradora.grafialumnosp',compact('a','b'));        
    }

    public function graficaAlumnosb(){
        $a = Solicitud::where('respuesta', 'SI')->count();
        $b = Solicitud::where('respuesta', 'NO')->count();
        
        return view('administradora.grafialumnosb',compact('a','b'));        
    }

    public function ver_reporte()
    {
        return view('administradora.reporte');
    }

    public function ver_grafica(){
        // $periodo = $request->get('periodo');
        // $hasta = $request->get('hasta');
        
        $Si = 0;
        $No = 0;
        // $aceptado = Solicitud::select('respuesta')->where('created_at', '>',$periodo, 'AND','created_at', '<=', $hasta )->get();
        // foreach($aceptado as $datos){
        //     if($datos->respuesta == 'SI'){
        //         $Si = $Si + 1;
        //     }
        //     if($datos->respuesta == 'NO'){
        //         $No = $No + 1;
        //     }
        // }

        return view('administradora.vergra', compact('Si','No'));
    }

    public function descargar_reporte(Request $request)
    {
        //dd($request->enviar);
        if($request->enviar == "Ver Grafica"){

            $periodo = $request->get('periodo');
            $hasta = $request->get('hasta');

            $a = 0;
            $b = 0;
            $c = 0;
            $d = 0;
            $e = 0;
            $f = 0;
            $g = 0;
            $h = 0;
            $i = 0;
            $j = 0;
            $k = 0;
            $m = 0;
            $n = 0;
            
            $solicitud = Solicitud::select('idsolicitud')->whereBetween('created_at',array($periodo,$hasta ))->get();
            foreach($solicitud as $perfil){
                $mi = $perfil->idsolicitud;
                //dd($mi);
                $saberp = Solicitudperfil::select('idperfiles')->where('idsolicitud',$mi)->get();
                //dd($saberp);
                foreach($saberp as $sp){
                    $mi2 = $sp->idperfiles;

                    //dd($mi2);
                    //dd($mi2);
                    if($mi2 == 1){
                        //sistemas
                        $a = $a + 1;
                    }else
                    if($mi2 == 4){
                        //gestion
                        $b = $b + 1;
                    }else
                    if($mi2 == 2){
                        //electrica
                        $c = $c + 1;
                    }else
                    if($mi2 == 3){
                        //electroncia
                        $d = $d + 1;
                    }else
                    if($mi2 == 9){
                        //quimica
                        $e = $e + 1;
                    }else
                    if($mi2 == 5){
                        //bioquimica
                        $f = $f + 1;
                    }else
                    if($mi2 == 6){
                        //industrial
                        $g = $g + 1;
                    }else
                    if($mi2 == 8){
                        //mecanica
                        $h = $h + 1;
                    }else
                    if($mi2 == 7){
                        //logistica
                        $i = $i + 1;
                    }else
                    if($mi2 == 71){
                        //maestria mecatronica
                        $j = $j + 1;
                    }else
                    if($mi2 == 72){
                        //maestria bioquimica
                        $k = $k + 1;
                    }else
                    if($mi2 == 91){
                        //doctorado alimentos y biotecno
                        $m = $m + 1;
                    }else
                    if($mi2 == 92){
                        //doctorado en ciencias 
                        $n = $n + 1;
                    }
                }
            }

           
        
            $Si = 0;
            $No = 0;
            
            $aceptado = Solicitud::select('respuesta')->whereBetween('created_at',array($periodo,$hasta ))->get();
            foreach($aceptado as $datos){
                if($datos->respuesta == 'SI'){
                    $Si = $Si + 1;
                }
                if($datos->respuesta == 'NO'){
                    $No = $No + 1;
                }
            }

            return view('administradora.vergra', compact('Si','No','a','b','c','d','e','f','g','h','i','j','k','m','n'));
        }
       
        if($request->enviar == "Imprimir"){
            $nombre = $request->nombre_extiende;
            $a = 0;
            $b = 0;
            $c = 0;
            $d = 0;
            $e = 0;
            $f = 0;
            $g = 0;
            $h = 0;
            $i = 0;
            $j = 0;
            $k = 0;
            $m = 0;
            $n = 0;
            $contem = 0;
            $conteg = 0;
            $carrera_mas = '';
            $carrera_menos = '';
            $dirigido = $request->get('dirigido');
            $cargo = $request->get('cargo');
            $numero = $request->get('numero');
            $periodo = $request->get('periodo');
            $hasta = $request->get('hasta');
            $extiende = $request->get('extiende');

        // dd($hasta);
        
            $empresa = User::select('origen')->whereBetween('created_at',array($periodo,$hasta ))->get();
            foreach($empresa as $datos){
                if($datos->origen == 'Empresa'){
                    $contem = $contem + 1;
                }
                if($datos->origen == 'Egresado'){
                    $conteg = $conteg + 1;
                }
            }
            
            $solicitud = Solicitud::select('idsolicitud')->whereBetween('created_at',array($periodo,$hasta ))->get();
            foreach($solicitud as $perfil){
                $mi = $perfil->idsolicitud;
                //dd($mi);
                $saberp = Solicitudperfil::select('idperfiles')->where('idsolicitud',$mi)->get();
                //dd($saberp);
                foreach($saberp as $sp){
                    $mi2 = $sp->idperfiles;

                    //dd($mi2);
                    //dd($mi2);
                    if($mi2 == 1){
                        //sistemas
                        $a = $a + 1;
                    }else
                    if($mi2 == 4){
                        //gestion
                        $b = $b + 1;
                    }else
                    if($mi2 == 2){
                        //electrica
                        $c = $c + 1;
                    }else
                    if($mi2 == 3){
                        //electroncia
                        $d = $d + 1;
                    }else
                    if($mi2 == 9){
                        //quimica
                        $e = $e + 1;
                    }else
                    if($mi2 == 5){
                        //bioquimica
                        $f = $f + 1;
                    }else
                    if($mi2 == 6){
                        //industrial
                        $g = $g + 1;
                    }else
                    if($mi2 == 8){
                        //mecanica
                        $h = $h + 1;
                    }else
                    if($mi2 == 7){
                        //logistica
                        $i = $i + 1;
                    }else
                    if($mi2 == 71){
                        //maestria mecatronica
                        $j = $j + 1;
                    }else
                    if($mi2 == 72){
                        //maestria bioquimica
                        $k = $k + 1;
                    }else
                    if($mi2 == 91){
                        //doctorado alimentos y biotecno
                        $m = $m + 1;
                    }else
                    if($mi2 == 92){
                        //doctorado en ciencias 
                        $n = $n + 1;
                    }
                }
            }
           

            $Si = 0;
            $No = 0;
            
            $aceptado = Solicitud::select('respuesta')->whereBetween('created_at',array($periodo,$hasta ))->get();
            foreach($aceptado as $datos){
                if($datos->respuesta == 'SI'){
                    $Si = $Si + 1;
                }
                if($datos->respuesta == 'NO'){
                    $No = $No + 1;
                }
            }
        
            
            //dd($c);
            $pdf = \PDF::loadView('administradora.impresion',compact('dirigido', 'cargo', 'numero', 'periodo', 'hasta', 'extiende', 'contem', 'conteg','nombre', 'a','b','c','d','e','f','g','h','i','j','k','m','n','Si', 'No'));
            return $pdf->download('reporte.pdf');

        }
       
        
    }
}
