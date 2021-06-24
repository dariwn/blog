<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Auth;
use DB;
use App\Egresado;
use App\Curriculo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use App\Egresadosolicitud;

use App\Mail\MensajeCambioUsuario;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class UserEgreController extends Controller
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
        //
        if(Auth::user()->origen == 'Administradora'){
        $usuarios = User::name($request->get('username'))->where('origen','Egresado')->get();
        //dd($usuarios);
        return view('adminusuarios.indexeg', compact('usuarios'));
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
        //
        abort(404, 'Página No Encontrada');
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
        try {
            $decode = Crypt::decrypt($id);        
            $versiarray = is_array($decode);
    
            if($versiarray == true){
                $id = $decode[0];
            }else{
                $id = $decode;
            } 
          }catch (DecryptException $e) {
            abort(404, 'Pagina No Encontrada');
         }

        $usuario = User::findOrFail($id);

        $egresado = Egresado::select('idegresado')->where('users_id', $usuario->id)->first();
       //dd($egresado);
        $egresados = Arr::flatten($egresado);
         
        $hola = Curriculo::select('idcurriculo')->where('idegresado',$egresados)->get()->pluck('idcurriculo');
        $holas = Arr::first($hola);
        $existe = 'No';
        $egresados = Egresado::select('idegresado')->where('users_id', $usuario->id)->first();
        return view('egresado.editusuario', compact('existe','usuario', 'egresados', 'hola'));
        
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
        if(Auth::user()->origen == 'Administradora'){
        $usuario = User::findOrFail($id);
        //dd($usuario);
        $existe = 'No';
        return view('adminusuarios.editeg', compact('existe','usuario'));
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
        //
        if(Auth::user()->origen == 'Egresado'){
            $usuario = User::findOrFail($id);
            //dd($usuario);
            $nameexist = DB::table('users')->where('username', $request->username)->exists();
            //dd($nameexist);
            if($nameexist == true){
                $existe = 'Si';
                $usuario = User::findOrFail($id);

                $egresados = Egresado::select('idegresado')->where('users_id', $usuario->id)->first();
               //dd($egresado);
                //$egresados = Arr::flatten($egresado);
        
                $hola = Curriculo::select('idcurriculo')->where('idegresado',$egresados)->get()->pluck('idcurriculo');
                $holas = Arr::first($hola);
        
                return view('egresado.editusuario', compact('existe','usuario', 'egresados', 'hola'));
                
            }else{
                $contraseña = $request->contraseña;
                //dd($contraseña);
                $usuario->username = $request->username;
                $usuario->password =  bcrypt($request->contraseña);
    
                //correo de aviso cambio de usuario
             
                $correoeg = $usuario->email;
        
                //  $data= array(
                //      'mensaje' => 'Ingresa',
                //      'direccion' => 'http://127.0.0.1:8000/BTEgresado',
                //      'usuario' => $request->username,
                //      'contraseña' => $contraseña,
                //  )
        
                //      Mail::send('emails.webcambioUser',$data,function($msg) use ($correoeg){
                //          $msg->from('from@example.com', 'Bolsa de Trabajo ITTG');
        
                //          $msg->to($correoeg)->subject('Notificacion');
                //      });
                // //dd($correoem);
                $data1 = $request->username;
                $data = $contraseña;
        
                Mail::to($correoeg)->send(new MensajeCambioUsuario($data1, $data));
        
                    $usuario->save();
                    return redirect('/egresado');
            }
            
        }
        if(Auth::user()->origen == 'Administradora'){
        $usuario = User::findOrFail($id);

        $nameexist = DB::table('users')->where('username', $request->username)->exists();
            //dd($nameexist);
            if($nameexist == true){
                $existe = 'Si';
                $usuario = User::findOrFail($id);
                //dd($usuario);
                
                return view('adminusuarios.editeg', compact('existe','usuario'));
                
            }else{
                $contraseña = $request->contraseña;
                $usuario->username = $request->username;
                $usuario->password =  bcrypt($request->contraseña);
                //$usuario->email = $request->email;
                //correo de aviso cambio de usuario
                $usuario->save();
                $correoeg = $usuario->email;

                //  $data= array(
                //      'mensaje' => 'Ingresa',
                //      'direccion' => 'http://127.0.0.1:8000/BTEgresado',
                //      'usuario' => $request->username,
                //      'contraseña' => $contraseña,
                //  );

                //      Mail::send('emails.webcambioUser',$data,function($msg) use ($correoeg){
                //          $msg->from('from@example.com', 'Bolsa de Trabajo ITTG');

                //          $msg->to($correoeg)->subject('Notificacion');
                //      });
                //dd($correoem);
                $data1 = $request->username;
                $data = $contraseña;

                Mail::to($correoeg)->send(new MensajeCambioUsuario($data1, $data));

                
                return redirect('/usuarios-egresados');
                //dd($usuario);
            }
        

        
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
        //eliminacion de usuario egresado y todo sus datos
        if(Auth::user()->origen == 'Administradora'){
            //dd($id);
            $usuario = User::findOrFail($id);
            //dd($usuario);
            $obtregi = DB::table('egresado')->where('users_id', $usuario->id)->exists();
            if($obtregi == true){ //obtiene el registro
                
                $obtregi = DB::table('egresado')->where('users_id', $usuario->id)->first();
                //dd($obtregi);
                $obtcurri = DB::table('curriculo')->where('idegresado', $obtregi->idegresado)->exists();
                //dd($obtcurri);
                if($obtcurri == true){ //obtiene curriculum
                    $obtcurri = DB::table('curriculo')->where('idegresado', $obtregi->idegresado)->first();
                    //dd($obtcurri);
                    $obtsoli = DB::table('egresadosolicitud')->where('idegresado',$obtregi->idegresado)->exists();
                    //dd($obtsoli);
                    if($obtsoli == true){ //obtiene solicitud
                        $obtsoli = DB::table('egresadosolicitud')->where('idegresado',$obtregi->idegresado)->first();
                        //dd($obtsoli->idegresado);
                        
                        DB::table('egresadosolicitud')->where('idegresado', '=', $obtsoli->idegresado)->delete();
                        // $eliminasoli = Egresadosolicitud::findOrFail($obtsoli->idegresado);
                        // dd($eliminasoli);
                        //$eliminasoli->delete();
                        $eliminacu = Curriculo::findOrFail($obtcurri->idegresado);
                        $eliminacu->delete();
                        $eliminare = Egresado::findOrFail($obtregi->idegresado);
                        $eliminare->delete();
                        $usuario->delete();
                        
                    }else{
                        //sino elimina el curriculum
                        $usuario = User::findOrFail($id);
                        //dd($usuario);
                        $obtregi = DB::table('egresado')->where('users_id', $usuario->id)->first();
                        //dd($obtregi);
                        $obtcurri = DB::table('curriculo')->where('idegresado', $obtregi->idegresado)->first();
                        //dd($obtcurri);
                        $eliminacu = Curriculo::findOrFail($obtcurri->idcurriculo);
                        //dd($eliminacu);
                        $eliminacu->delete();
                        $eliminare = Egresado::findOrFail($obtregi->idegresado);
                        //dd($eliminare);
                        $eliminare->delete();
                        //dd($usuario);
                        $usuario->delete();
                    }
                }else{
                    //sino se elimina el registro
                    $eliminare = Egresado::findOrFail($obtregi->idegresado);
                    $eliminare->delete();
                    $usuario->delete();
                }


            }else{ //sino hay registro elimina el user
                $usuario->delete();
                $obtregiusernew = DB::table('registro_egresado_nuevos')->where('email', $usuario->email)->exists();
                $obtregiusernew1 = DB::table('registro_egresado_nuevos')->where('email', $usuario->email)->first();
                if($obtregiusernew == true){
                    DB::table('registro_egresado_nuevos')->where('email', '=', $obtregiusernew1->email)->delete();
                }else{

                }
                
            }

           
           
            return redirect('/usuarios-egresados');
            
        }
        

    }
}
