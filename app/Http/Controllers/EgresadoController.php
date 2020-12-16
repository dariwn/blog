<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Egresado;
use App\Pais;
use App\Estado;
use App\Municipio;
use App\Perfil;
use App\Genero;
use App\Solicitud;
use App\Solicitudperfil;
use App\Egresadosolicitud;
use App\Empresa;
use App\Curriculo;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;


class EgresadoController extends Controller
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
    
    public function index(Request $request)
    {
        //$egresado = Egresado::all();
        //dd($egresado);
        if(Auth::user()->tipo == 1){
            return view('egresado.inicio');
        }

        else{
        $usuario = Auth::user()->id;
        //dd($usuario);
        $egresado = Egresado::select('idegresado')->where('users_id', $usuario)->first();
       //dd($egresado->idegresado);
       $dato = $egresado->idegresado;
        $egresados = array_flatten($egresado);
        
        if($usuario = Auth::user()->curriculo == 1){
            $hola = 0;
        }else{
            $hola = $egresado->idegresado;
            //$hola1 = DB::table('curriculo')->whereIn('idcurriculo', $egresado)->get();
            //$hola = $hola1[0]->idcurriculo;
        }
       
        //$hola = Curriculo::select('idcurriculo')->get()->pluck('idcurriculo');
        //->where('idegresado', $egresado)
        //dd($hola);
        
       // $holas = array_flatten($hola);
        //dd($holas);
        $egresados = $egresado->idegresado;
        //dd($egresados);
        return view('egresado.inicio', compact('egresados','hola'));
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //dd($request->file('file'));

        $usuario = Auth::user()->id;
        $admin = DB::table('users')->where('id', $usuario)->update(['tipo' => 0]);
        $egresado = new Egresado;
        $egresado->correo=$request->get('correo');
        $egresado->nombres=$request->get('nombres');
        $egresado->apellido_paterno=$request->get('apellido_paterno');
        $egresado->apellido_materno=$request->get('apellido_materno');
        $egresado->domicilio=$request->get('domicilio');
        $egresado->colonia=$request->get('colonia');
        $egresado->fecha_de_nac=$request->get('fecha_de_nac');
        $egresado->numero_cel=$request->get('numero_cel');
        $egresado->pais_id=$request->get('pais_id');
        $egresado->estado_id=$request->get('estado_id');
        $egresado->municipio_id=$request->get('municipio_id');
        $egresado->perfiles_id=$request->get('perfiles_id');
        $egresado->genero_id=$request->get('genero_id');
        $egresado->users_id = $usuario;
        
        if($request->hasFile('file')){
            $archivo = $request->file('file');
            $nombre = time().$archivo->getClientOriginalName();
            $archivo->move(public_path().'/img',$nombre);
            //dd($nombre);
            $egresado->imagen = $nombre;
        }else{
            
        }
               
        $egresado->save();
        return Redirect::to('onda');
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
        //dd($usuario);
        $egresado = Egresado::select('idegresado')->where('users_id', $usuario)->first();
       //dd($egresado);
        $egresados = array_flatten($egresado);
        
        //$hola1 = DB::table('curriculo')->whereIn('idcurriculo', $egresado)->get();
        //$hola = $hola1[0]->idcurriculo;
        $hola = $egresado->idegresado;
        //dd($hola);
        $egresado = Egresado::find($id);
        $egresados = Egresado::select('idegresado')->where('users_id', $usuario)->first();
        
        return view('egresado.show',compact('egresado', 'egresados','hola'));
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
        $egresado = Egresado::select('idegresado')->where('users_id', $usuario)->first();
        $egresados = array_flatten($egresado);
        //dd($egresado);
        
        // $hola1 = DB::table('curriculo')->whereIn('idcurriculo', $egresado)->get();
        // $hola = $hola1[0]->idcurriculo;
        $hola = $egresado->idegresado;

        $estados = Estado::all();
        $generos = Genero::all();
        $localidades = Municipio::all();
        $egresado = Egresado::find($id);
        $perfiles = Perfil::all();
        return view('egresado.editar', compact('estados','localidades','egresado','egresados','perfiles','generos','hola'));
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
         //dd($request->file('file'));
       
        $egresado = Egresado::findOrFail($id);        

        $path = public_path().'/img'.$egresado->imagen;
        File::delete($path);

        $egresado->nombres = $request->nombres;
        $egresado->correo = $request->correo;
        $egresado->colonia = $request->colonia;
        $egresado->apellido_materno = $request->apellido_materno;
        $egresado->apellido_paterno = $request->apellido_paterno;
        $egresado->fecha_de_nac = $request->fecha_de_nac;
        $egresado->numero_cel = $request->numero_cel;
        $egresado->perfiles_id = $request->perfiles_id;
        $egresado->domicilio = $request->domicilio;
        $egresado->genero_id = $request->genero_id;
        $egresado->estado_id = $request->estado_id;
        $egresado->municipio_id = $request->municipio_id;

        if($request->hasFile('file')){
            $archivo = $request->file('file');
            $nombre = time().$archivo->getClientOriginalName();
            $archivo->move(public_path().'/img',$nombre);
            //return $nombre;
            $egresado->imagen = $nombre;
            
        }else{
            
        }

       

        $egresado->save();
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
        abort(404, 'Página No Encontrada');
    }

    public function bienvenido(){
        $usuario = Auth::user()->id;
        $egresado = Egresado::select('idegresado')->where('users_id', $usuario)->get()->pluck('idegresado');
        $egresados = array_flatten($egresado);

        
        $hola = Curriculo::select('idcurriculo')->get();
        $holas = array_flatten($hola);
        
        $paises = Pais::all();
        $estados = Estado::all();
        $generos = Genero::all();
        $perfiles = Perfil::all();
        $municipios = Municipio::all();
        return view('egresado.crear', compact('paises','estados','generos','municipios','perfiles','egresados','holas'));
    }

    public function versolicitud()
    {
        
        $usuario = Auth::user()->id;
        
       
        $egresados = Egresado::select('perfiles_id')->where('users_id', $usuario)->get()->pluck('perfiles_id');
        $a = array_first($egresados);
        //dd($egresado);

        $egresado1 = Egresado::select('idegresado')->where('users_id', $usuario)->first();
       //dd($egresado);
        $egresados1 = array_flatten($egresado1);
        //$hola1 = DB::table('curriculo')->whereIn('idcurriculo', $egresado1)->get();
        //$hola = $hola1[0]->idcurriculo;               
        $hola = $egresado1->idegresado;
        $solicitudes= Solicitudperfil::select('idsolicitud')->where('idperfiles',$egresados)->get();
       
        // dd($solicitudes);
       /* ->join('solicitud', 'solicitud.idsolicitud','=','solicitudperfil.idsolicitud')
        ->join('egresado', 'egresado.perfiles_id', '=','solicitudperfil.idperfiles')
        ->get();*/
        $egresados = Egresado::select('idegresado')->where('users_id', $usuario)->first();
        
        return view('egresado.solicitud', compact('egresados','solicitudes','hola'));
    }

    public function getMunicipio(Request $request, $id){
        if($request->ajax()){
            $municipio = Municipio::municipios($id);
            return response()->json($municipio);
        }
    }

    public function postularse($id){

        $usuario = Auth::user()->id;
        $egresado = Egresado::select('idegresado')->where('users_id', $usuario)->get();
        $egresados = array_first($egresado);
        //dd($egresado);

        $egresado1 = Egresado::select('idegresado')->where('users_id', $usuario)->get();
        //dd($egresado);
         $egresados1 = array_flatten($egresado1);
         //$hola1 = DB::table('curriculo')->whereIn('idcurriculo', $egresado1)->get();
         //$hola = $hola1[0]->idcurriculo;   
         $hola = $egresado[0]->idegresado; 
         //dd($hola);
        
        $solicitudes = Solicitud::find($id);
        $a = Solicitud::select('id_empresa')->where('idsolicitud',$id)->get();
        $b = array_first($a);
        //dd($b);

        $e = Empresa::select('nombre')->whereIn('idempresa',$b)->get();
        $empresa = array_first($e);
        //dd($e);


        $j = Egresado::select('perfiles_id')->get()->pluck('perfiles_id');
        //dd($j);
        $w = array_first($j);

        $p = Perfil::select('carrera')->where('idperfiles',$w)->get()->pluck('carrera');
        $perfil = array_first($p);

        return view('egresado.postularse',compact('egresados','solicitudes','empresa','b','perfil','hola'));
    }

    public function guardar_postulados(Request $request){

        $usuario = Auth::user()->id;
        $egresado1 = Egresado::select('idegresado')->where('users_id', $usuario)->get();
        //dd($egresado1);
         $egresados1 = array_flatten($egresado1);
         //$hola1 = DB::table('curriculo')->whereIn('idcurriculo', $egresado1)->get();
         //$hola = $hola1[0]->idcurriculo;  
         $hola = $egresado1[0]->idegresado; 

         //dd($request->idempresa);

        $postulado = new Egresadosolicitud;
        $postulado->idsolicitud = $request->idsolicitud;
        $postulado->idegresado = $request->idegresado;
        if($request->comentario == ""){
            $comen = "vacio";
            //
            $postulado->comentario = " ";
        }else{
            //dd($request->comentario);
            $postulado->comentario = $request->comentario;
        } 
        //dd($hola);       
        $postulado->curriculum = $hola;
        $postulado->idempresa = $request->idempresa;
        $postulado->estatus = $request->estatus;

        // $obcorreo = Empresa::select('email')->where('idempresa',$request->idempresa)->get();
        // $correoem = $obcorreo[0]->email;

        // $data= array(
        //     'mensaje' => 'Ingresa',
        //     'direccion' => 'http://127.0.0.1:8000/BTEmpresa'
        // );

        //     Mail::send('emails.webemp',$data,function($msg) use ($correoem){

        //         $msg->from('from@example.com', 'Bolsa de Trabajo ITTG');

        //         $msg->to($correoem)->subject('Notificacion');
        //     });
        // //dd($correoem);
        
        $postulado->save();

        
        

        return Redirect::to('postulaciones');
    }

    public function postulaciones(){
        $usuario = Auth::user()->id;
        //dd($usuario);
        $egresado = Egresado::select('idegresado')->where('users_id', $usuario)->first();
        //dd($egresados);
        
        //$egresados = array_first($egresado);
        //dd($egresado);
        
        //$hola1 = DB::table('curriculo')->whereIn('idcurriculo', $egresado)->get();
        //$hola = $hola1[0]->idcurriculo; 
        $hola = $egresado->idegresado; 
        //dd($hola);

        $postulados = DB::table('egresadosolicitud')->whereIn('idegresado',$egresado)->get();
        $egresados = array_flatten($egresado);
        //$postulados = Egresadosolicitud::where('idegresado',$egresados)->get();
        //dd($postulados[0]);
        /*$postulados->each(function($postulados){
            $postulados->idsolicitud;
            $postulados->idempresa;
        });
        
        dd($postulados);*/
        //$postulados1 = DB::table('solicitud')->where('idsolicitud',$postulados->idsolicitud)->get();
    //dd($egresados);
    $egresados = Egresado::select('idegresado')->where('users_id', $usuario)->first();

        return view('egresado.postulacion', compact('egresados','postulados','hola'));
    }

    public function botonEgresado(Request $request, $id){
        $id = $id;
        //dd($id);
        $postulaciones = Egresadosolicitud::find($id);
        //dd($postulaciones->estatus);
        if($postulaciones['estatus']=='Postulado                     '){
            $postulaciones->update(['estatus'=>'No Postulado']);
            return back();
        }
        else if($postulaciones['estatus']=='No Postulado                  '){
            $postulaciones->update(['estatus'=>'Postulado']);
            return back();
        }
    }


}