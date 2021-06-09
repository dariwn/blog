<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Empresa;
use App\Estado;
use App\Municipio;
use App\Pais;
use App\User;
use App\Solicitud;
use App\Solicitudperfil;
use App\Encuesta;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Auth\Events\Registered;


class EmpresaController extends Controller
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
        if(Auth::user()->origen == 'Empresa'){
            $empresa = Empresa::all();
            if($empresa == null){
                return view('empresa.inicio1', compact('empresa'));
            }

            else{
            $usuario = Auth::user()->id;
            //dd($usuario);
            $empresa = Empresa::select('idempresa')->where('users_id', $usuario)->get()->pluck('idempresa');
            $empresas = Arr::flatten($empresa);
            return view('empresa.inicio1', compact('empresas'));
            }
        }else{
            abort(404, 'Página No Encontrada');
        }
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
        $rules= [
            //'rfcempresa' => 'min: 13', 
            'telefono' => 'min: 10', 
            'numero_cel' => 'min: 10',
                      
        ];
        $messages = [
            
            //'rfcempresa.min' => 'El campo RFC debe tener 13 digitos.',
            'telefono.min' => 'El campo numero de telefono debe tener 10 digitos.',
            'numero_cel.min' => 'El campo numero de celular debe tener 10 digitos.',
        ];

        $this->validate($request, $rules, $messages);

        if(Auth::user()->origen == 'Empresa'){
        $usuario = Auth::user()->id;
        $admin = DB::table('users')->where('id', $usuario)->update(['tipo' => 0]);
        $empresa = new Empresa;
        $empresa->users_id = $usuario;
        $empresa->municipio_id=$request->get('municipio_id');
        $empresa->estado_id=$request->get('estado_id');
        $empresa->nombre=$request->get('nombre');
        $empresa->rfc=$request->get('rfc');
        $empresa->descripcion=$request->get('descripcion');
        $empresa->colonia=$request->get('colonia');
        $empresa->calle=$request->get('calle');
        $empresa->numeroexterior=$request->get('numeroexterior');
        $empresa->codigo_postal=$request->get('codigo_postal');
        $empresa->telefono=$request->get('telefono');
        $empresa->pais_id=$request->get('pais_id');
        $empresa->names = $request->get('names');
        $empresa->apellido_paterno = $request->get('apellido_paterno');
        $empresa->apellido_materno = $request->get('apellido_materno');
        $empresa->cargo = $request->get('cargo');
        $empresa->email = $request->get('email');
        $empresa->numero_cel = $request->get('numero_cel');

        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $file->move(public_path().'/imagenes',$file->getClientOriginalName());
            $empresa->imagen=$file->getClientOriginalName();
        }
        
        $Ucorreo = User::find($usuario);
        $Ucorreo->email = $request->get('email');

        $Ucorreo->save();
        $empresa->save();

        event(new Registered($Ucorreo));
        return redirect()->route('empresa.index');
        }else{
            abort(404, 'Página No Encontrada');
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
        if(Auth::user()->origen == 'Empresa'){
        $tipo = $id;
        //dd($tipo);
        $usuario = Auth::user()->id;
       // dd($usuario);
        $empresa = Empresa::select('idempresa')->where('users_id', $usuario)->get();
       // dd($empresa);
        $empresas = Arr::flatten($empresa);
        //-------------------------------
        $empresa = Empresa::find($tipo);
        //dd($empresa);
        return view('empresa.show', compact('empresa','empresas'));
        }else{
            abort(404, 'Página No Encontrada');
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
        if(Auth::user()->origen == 'Empresa'){
        $usuario = Auth::user()->id;
        $empresa = Empresa::select('idempresa')->where('users_id', $usuario)->get()->pluck('idempresa');
        $empresas = Arr::flatten($empresa);

        $estados = Estado::all();
        $localidades = Municipio::all();
        $empresa = Empresa::find($id);
        return view('empresa.editar', compact('empresa', 'estados','localidades','empresas'));
        }else{
            abort(404, 'Página No Encontrada');
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
       // dd($request);
       if(Auth::user()->origen == 'Empresa'){
        $empresa = Empresa::findOrFail($id);

        // $path = public_path().'/imagenes/empresas/'.$empresa->imagen;
        // File::delete($path);

        $empresa->nombre = $request->nombre;
        $empresa->rfc = $request->rfc;
        $empresa->descripcion = $request->descripcion;
        $empresa->calle = $request->calle;
        $empresa->colonia = $request->colonia;
        $empresa->numeroexterior = $request->numeroexterior;
        $empresa->codigo_postal = $request->codigo_postal;
        $empresa->telefono = $request->telefono;
        $empresa->estado_id = $request->estado_id;
        $empresa->municipio_id = $request->municipio_id;
        $empresa->names = $request->names;
        $empresa->apellido_paterno = $request->apellido_paterno;
        $empresa->apellido_materno = $request->apellido_materno;
        $empresa->cargo = $request->cargo;
        $empresa->numero_cel = $request->numero_cel;
        $empresa->email = $request->email;
    

        if($request->hasFile('imagen')){

            $path = public_path().'/imagenes'.$empresa->imagen;
            //dd($path);
            File::delete($path);

            $file=$request->file('imagen');
            $file->move(public_path().'/imagenes',$file->getClientOriginalName());
            $empresa->imagen=$file->getClientOriginalName();
        }

        $usuario = Auth::user()->id;
        //dd($usuario);
        $Ucorreo = User::find($usuario);
        $Ucorreo->email = $request->email;
        $Ucorreo->curriculo = "1";

        $Ucorreo->save();
        $empresa->save();
        return redirect()->route('empresa.index');
        }else{
            abort(404, 'Página No Encontrada');
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
        $usuario = User::findOrFail($id);
        
        $obtempresaid = Empresa::select('idempresa')->where('users_id', $id)->exists();
        //dd($obtempresaid);
        if($obtempresaid == true){
            $obtempresaid = Empresa::select('idempresa')->where('users_id', $id)->first();
            $empresa = Empresa::findOrFail($obtempresaid->idempresa);

            $obtesolicitudid = Solicitud::select('idsolicitud')->where('id_empresa', $obtempresaid->idempresa )->exists();
            if($obtesolicitudid == true){

                $obtesolicitudid = Solicitud::select('idsolicitud')->where('id_empresa', $obtempresaid->idempresa )->get(); 
                //dd($numerosolici);
                //dd($obtesolicitudid);
                
                foreach ($obtesolicitudid as $soli) {
                    $solicitud = Solicitud::findOrFail($soli->idsolicitud);
                    //echo $solicitud->idsolicitud;
                    
                    //echo $solicitud;
                    $obteperfilid = Solicitudperfil::select('id')->where('idsolicitud',$solicitud->idsolicitud)->get();
                    //dd($obteperfilid);
                    foreach ($obteperfilid as $perfil) {
                        $perfil = Solicitudperfil::findOrFail($perfil->id);
                        
                        //echo $perfil->id;                                                
                        
                        DB::table('solicitudperfil')->where('id', '=', $perfil->id)->delete();

                        //return redirect('/usuarios-empresa');
                        
                    }
                    //elimina la solicitued de egresados
                    DB::table('egresadosolicitud')->where('idsolicitud', '=', $solicitud->idsolicitud)->delete();
                    DB::table('solicitud')->where('idsolicitud', '=', $solicitud->idsolicitud)->delete();

                }
            } else{
                //elimina registro de empresa
                //echo $obtempresaid;
                DB::table('empresas')->where('idempresa', '=', $obtempresaid->idempresa)->delete();
            }
            //registro empresa se elimina
            DB::table('empresas')->where('idempresa', '=', $obtempresaid->idempresa)->delete();
        }else{
            //elimina usuario si no tiene registro en empresa
            //echo $usuario;
            DB::table('users')->where('id', '=', $id)->delete();
        }

        DB::table('users')->where('id', '=', $id)->delete();
      
        return redirect('/usuarios-empresa');

    }

    public function nuevo(){
        if(Auth::user()->origen == 'Empresa'){
        $usuario = Auth::user()->id;
        $usuario1 = Auth::user()->email;
        $empresa = Empresa::select('idempresa')->where('users_id', $usuario)->get()->pluck('idempresa');
        $empresas = Arr::flatten($empresa);

        $estados = Estado::all();
        $localidades = DB::table('municipio')->get();
        $paises = Pais::all();
        //dd($localidades);
        return view('empresa.crear',compact('usuario1','localidades','estados','paises', 'empresas'));
        }else{
            abort(404, 'Página No Encontrada');
        }
    }

    public function getMunicipio(Request $request, $id){
        if($request->ajax()){
            $municipio = Municipio::municipios($id);
            return response()->json($municipio);
        }
    }
}