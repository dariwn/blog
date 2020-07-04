<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Solicitud;
use App\Empresa;
use App\Egresadosolicitud;
use App\Egresado;
use App\Solicitudperfil;
use App\Perfil;
use App\Genero;
use App\Curriculo;
use App\Encuesta;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;


class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario = Auth::user()->id;
        $empresa = Empresa::select('idempresa')->where('users_id', $usuario)->get()->pluck('idempresa');
        $empresas = array_first($empresa);

        $solicitudes = Solicitud::where('id_empresa', $empresa)->paginate(20);

        //dd($solicitudes);
        $egresolicitados = Egresadosolicitud::where('estatus','Postulado')->get();
        //dd($egresolicitados);
        $egresolicitados->each(function($egresolicitados){
            $egresolicitados->egresado;
        });
        return view('solicitud.ver', compact('solicitudes','empresas','egresolicitados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = Auth::user()->id;
        $empresas = Empresa::select('idempresa')->where('users_id', $usuario)->get()->pluck('idempresa');
        // dd($empresas);
        $empresa = array_first($empresas);
        //dd($empresa);
        $perfiles = Perfil::all();
        $generos = Genero::all(); 
        $empresas = Empresa::find($empresa);
        return view('solicitud.crear', compact('empresa','empresas','perfiles','generos'));
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
        $empresas = Empresa::select('idempresa')->where('users_id', $usuario)->get();
        //dd($empresas[0]->idempresa);
  
        DB::beginTransaction();
        try{ 

        $nuevo = new Solicitud;
        $nuevo->nombredelpuesto = $request->nombredelpuesto;
        $nuevo->salario = $request->salario;
        $nuevo->idsexo = $request->idsexo;
        $nuevo->horario = $request->horario;
        $nuevo->descripcion_del_puesto = $request->descripcion_del_puesto;
        $nuevo->tiempo_de_contratacion = $request->tiempo_de_contratacion;
        $nuevo->edades = $request->edades;
        $nuevo->requisito = $request->requisito;
        $nuevo->estado_civil = $request->estado_civil;
        $nuevo->cambio_de_residencia = $request->cambio_de_residencia;
        $nuevo->id_empresa = $empresas[0]->idempresa;
        $nuevo->respuesta = " ";
        $nuevo->estatus = $request->estatus;
        $nuevo->created_at = date('Y-m-d H:m:s');
        $nuevo->updated_at = date('Y-m-d H:m:s');
        $nuevo->save();
        
        $perfiles = $request->perfil;
        foreach($perfiles as $bienvenido){
            $linea = new Solicitudperfil;
            $linea->idperfiles=$bienvenido;            
            $linea->idsolicitud = $nuevo->idsolicitud;

// //---- envio de correo para egresados con el perfil solicitado
//             //dd($linea->idperfiles);
//              $obcorreo = Egresado::select('correo')->where('perfiles_id',$linea->idperfiles)->get();
//              foreach($obcorreo as $correo){
//                // dd($correo->correo);
//                $email = $correo->correo;
//             //cuerpo y envio del correo
//             $data= array(
//                 'mensaje' => 'Ingresa',
//                 'direccion' => 'http://127.0.0.1:8000/BTEgresado'
                
//             );

//                 Mail::send('emails.web',$data,function($msg) use ($email){

//                     $msg->from('from@example.com', 'Bolsa de Trabajo ITTG');

//                     $msg->to($email)->subject('Notificacion');
//                 });

//              }
//             // dd($obcorreo);

            $linea->save();
        }
        DB::commit();
        return back();
       }

       catch(Exception $e){
        DB::rollBack();
        return redirect("/solicitud")->with('ok','ERROR');
       }
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
    public function edit($id)
    {
        $usuario = Auth::user()->id;
        $empresa = Empresa::select('idempresa')->where('users_id', $usuario)->get()->pluck('idempresa');
        $empresas = array_first($empresa);

        $solicitudes = Solicitud::find($id);
        $perfiles = Perfil::all();
        $generos = Genero::all();
        return view('solicitud.editar', compact('empresas', 'solicitudes', 'perfiles','generos'));
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
        $solicitudes = Solicitud::find($id);
        $solicitudes->nombredelpuesto = $request->nombredelpuesto;
        $solicitudes->salario = $request->salario;
        $solicitudes->idsexo = $request->idsexo;
        $solicitudes->horario = $request->horario;
        $solicitudes->descripcion_del_puesto = $request->descripcion_del_puesto;
        $solicitudes->tiempo_de_contratacion = $request->tiempo_de_contratacion;
        $solicitudes->edades = $request->edades;
        $solicitudes->requisito = $request->requisito;
        $solicitudes->estado_civil = $request->estado_civil;
        $solicitudes->cambio_de_residencia = $request->cambio_de_residencia;
        $solicitudes->id_empresa = $request->id_empresa;
        $solicitudes->estatus = $request->estatus;
        $solicitudes->created_at = date('Y-m-d H:m:s');
        $solicitudes->updated_at = date('Y-m-d H:m:s');
        $solicitudes->save();
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

    public function ver($id){
        $usuario = Auth::user()->id;
        $empresa = Empresa::select('idempresa')->where('users_id', $usuario)->get()->pluck('idempresa');
        $empresas = array_flatten($empresa);

        $egresolicitados = Egresadosolicitud::select('idegresado')->where('idsolicitud', $id)->get();
        //dd($egresolicitados);

        $postulados = Egresadosolicitud::where('idsolicitud', $id)->get();
        $postulados->each(function($postulados){
            $postulados->egresado;
        });
        
        return view('solicitud.postulado', compact('postulados', 'empresas'));
    }

    public function curriculopdfver($id){
        //creacion del pdf y guardado        
        $usuario = $id;
        
        $egresado = Egresado::select('idegresado')->where('idegresado', $usuario)->get()->pluck('idegresado');
        $egresados = array_flatten($egresado);
        //dd($egresados);
        //$hola = Curriculo::select('idcurriculo')->where('idcurriculo',$egresados)->get()->pluck('idcurriculo');
        //$holas = array_flatten($hola);
        $nombre = Egresado::select('nombres')->where('idegresado',$usuario)->get();
        $apellidop = Egresado::select('apellido_paterno')->where('idegresado',$usuario)->get();
        $apellidom = Egresado::select('apellido_materno')->where('idegresado',$usuario)->get();
        //dd($nombre[0]->nombres);
 
        $hola = Curriculo::select('idcurriculo')->where('idegresado',$egresados)->get()->pluck('idcurriculo');
        $holas = array_first($hola);
        
        $hola = Curriculo::find($holas); 
           
    
        $pdf = PDF::loadview('curriculo.curriculopdf',compact('holas', 'hola','egresados')); 
        //return $pdf->download('Denuncia.pdf');
        return $pdf->stream('cv-'.$nombre[0]->nombres.'_'.$apellidop[0]->apellido_paterno.'_'.$apellidom[0]->apellido_materno.'pdf');
     }

    public function encuesta($id){
        $dato = $_GET['resp'];
        $ids = $id;
        //dd($ids);
        $solicitudes = Solicitud::find($ids);
        if($dato === "SI"){

            
            //dd($solicitudes);
            $solicitudes->respuesta= "SI";
            $solicitudes->save();

            $usuario = Auth::user()->id;
            $empresa = Empresa::select('idempresa')->where('users_id', $usuario)->get()->pluck('idempresa');
            $empresas = array_first($empresa);
            $solicitudes = Solicitud::where('id_empresa', $empresa)->paginate(20);
            $egresolicitados = Egresadosolicitud::all();
            $egresolicitados->each(function($egresolicitados){
                $egresolicitados->egresado;
            });
            return view('solicitud.ver', compact('solicitudes','empresas','egresolicitados'));

        }else{
            //$solicitudes = Solicitud::find($ids);
            //dd($solicitudes);
            $solicitudes->respuesta= "NO";
            $solicitudes->save();

            $usuario = Auth::user()->id;
            $empresa = Empresa::select('idempresa')->where('users_id', $usuario)->get()->pluck('idempresa');
            $empresas = array_first($empresa);
            $solicitudes = Solicitud::where('id_empresa', $empresa)->paginate(20);
            $egresolicitados = Egresadosolicitud::all();
            $egresolicitados->each(function($egresolicitados){
                $egresolicitados->egresado;
            });
            return view('solicitud.ver', compact('solicitudes','empresas','egresolicitados'));
        }
    } 

    public function boton($id, Request $request){        
        $solicitudes = Solicitud::findOrFail($id);
        
        $dato = $solicitudes->idsolicitud;
        //dd($dato);
        if($solicitudes->estatus == 'Vigente'){
            $solicitudes->update(['estatus'=>'No Vigente',]);            
            return view('solicitud.encuesta',compact('dato'));
            //return back();
        }
        elseif($solicitudes->estatus == 'No Vigente'){
            $solicitudes->update(['estatus'=>'Vigente',]);
            return back();
        }
    }
}
