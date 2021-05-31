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
        $usuario = User::findOrFail($id);

        $egresado = Egresado::select('idegresado')->where('users_id', $usuario->id)->first();
       //dd($egresado);
        $egresados = Arr::flatten($egresado);

        $hola = Curriculo::select('idcurriculo')->where('idegresado',$egresados)->get()->pluck('idcurriculo');
        $holas = Arr::first($hola);

        return view('egresado.editusuario', compact('usuario', 'egresados', 'hola'));
        
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
        return view('adminusuarios.editeg', compact('usuario'));
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
        if(Auth::user()->origen == 'Administradora'){
        $usuario = User::findOrFail($id);

        $contraseña = $request->contraseña;
        $usuario->username = $request->username;
        $usuario->password =  bcrypt($request->contraseña);
        $usuario->email = $request->email;
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
            }

           
           
            return redirect('/usuarios-egresados');
            
        }
        

    }
}
