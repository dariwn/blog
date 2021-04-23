<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Empresa;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

use App\Mail\MensajeAceptado;

class RegistroEmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort(404, 'Página No Encontrada');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empresa.registro');
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
        $usuario = 'EM'.$request->rfcempresa;
        $random_password = Str::random(8);

        $user = new User;
        $user->origen = 'Empresa';
        $user->email = $request->correo;
        $user->password = bcrypt($random_password);
        $user->username = $usuario;
        $user->tipo = "0";
        $user->curriculo = "2";

        $user->save();

        $userid = DB::table('users')->where('email','=',$request->correo)->first();
        //dd($userid->id);
        $empresan = new Empresa;
        $empresan->rfc = $request->rfcempresa;
        $empresan->nombre = $request->nombreempresa;

        $empresan->names = $request->nombre;
        $empresan->apellido_paterno = $request->apellidop;
        $empresan->apellido_materno = $request->apellidom;
        $empresan->numero_cel = $request->telefono_celular;
        $empresan->email = $request->correo;
        $empresan->cargo ='';
        $empresan->descripcion='';
        $empresan->colonia = '';
        $empresan->calle = '';
        $empresan->numeroexterior= 0;
        $empresan->codigo_postal = 0;
        $empresan->telefono = 0;
        $empresan->estado_id = 1;
        $empresan->pais_id = 1;
        $empresan->municipio_id = 1;
        $empresan->imagen = '';
        $empresan->users_id = $userid->id;
        

        


         //correo de aviso cambio de usuario
         
         $correoeg = $request->correo;

        //  $data= array(
        //      'mensaje' => 'Ingresa',
        //      'direccion' => 'http://127.0.0.1:8000/BTEmpresa',
        //      'usuario' => $usuario,
        //      'contraseña' => $random_password,
        //  );

        //      Mail::send('emails.webregistroemp',$data,function($msg) use ($correoeg){
        //          $msg->from('from@example.com', 'Bolsa de Trabajo ITTG');

        //          $msg->to($correoeg)->subject('Notificacion');
        //      });
        //  //dd($correoem);
        $data1 = $usuario;
        $data = $random_password;
        Mail::to($correoeg)->send(new MensajeAceptado($data1, $data));

         $empresan->save();
         
             
        event(new Registered($user));

        return view('empresa.aviso');//Redirect::to('/BTEmpresa')->with('registro','Hemos enviado un correo electronico con tu usuario y contraseña, para que puedas acceder');
        
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
}
