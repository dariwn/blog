<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistroEgresadoNuevo;
use App\User;
use App\Egresado;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class RegistroEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->origen == 'Administradora'){
            $nuevoegre = DB::table('registro_egresado_nuevos')->where('Validacion', 'No')->get();
            //dd($usuarios);
            return view('administradora.indexegrenuevo', compact('nuevoegre'));
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
        return view('egresado.registro');
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
        //dd($request);
        $nuevoeg = new RegistroEgresadoNuevo;
        $nuevoeg->numero_control = $request->numerocontrol;
        $nuevoeg->nombres = $request->nombre;
        $nuevoeg->apellido_paterno = $request->apellidop;
        $nuevoeg->apellido_materno = $request->apellidom;
        $nuevoeg->correo = $request->correo;
        $nuevoeg->Validacion = 'No';

        $nuevoeg->save();

        return view('layouts.aviso');

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
        //dd($id);
        if(Auth::user()->origen == 'Administradora'){
            $usuario = RegistroEgresadoNuevo::findOrFail($id);
            //dd($usuario->numero_control);
           
            $usuario->Validacion = 'Si'; 
            
            $usuarioegre = 'EG'.$usuario->numero_control;
            $random_password = Str::random(8);

            $user = new User;
            $user->origen = 'Egresado';
            $user->email = $usuario->correo;
            $user->password = bcrypt($random_password);
            $user->username = $usuarioegre;
            $user->tipo = 1;
            $user->curriculo = 1;

          

            $correoeg = $usuario->correo;

            $data= array(
                'mensaje' => 'Ingresa',
                'direccion' => 'http://127.0.0.1:8000/BTEgresado',
                'usuario' => $usuarioegre,
                'contraseña' => $random_password,
            );
   
                Mail::send('emails.webregistroemp',$data,function($msg) use ($correoeg){
                    $msg->from('from@example.com', 'Bolsa de Trabajo ITTG');
   
                    $msg->to($correoeg)->subject('Notificacion');
                });
            //dd($correoem);

           $usuario->save(); 
           $user->save();
            
                
           event(new Registered($user));

            return Redirect('/nuevoegresado');
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
        //dd($id);
        if(Auth::user()->origen == 'Administradora'){
            $usuario = RegistroEgresadoNuevo::findOrFail($id);
            //dd($usuario);

            $correoeg = $usuario->correo;
            $correoadmin = Auth::user()->email;

            //dd($correoadmin);
            $data= array(
                'mensaje' => 'Rechazado',
                'mensaje2' => $correoadmin,
                'direccion' => 'http://127.0.0.1:8000/BTEgresado',                
            );
   
                Mail::send('emails.webrechazoegre',$data,function($msg) use ($correoeg){
                    $msg->from('from@example.com', 'Bolsa de Trabajo ITTG');
   
                    $msg->to($correoeg)->subject('Notificacion');
                });
            //dd($correoem);

            $usuario->delete();

            return Redirect('/nuevoegresado');
            }else{
                abort(404, 'Página No Encontrada');
            }

    }
}
