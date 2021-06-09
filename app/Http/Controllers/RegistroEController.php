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
use Carbon\Carbon; 
use DateTime;
use App\Jobs\VerificaEmail;
use App\Jobs\RegistroNoEditado;

use App\Mail\MensajeRechazado;
use App\Mail\MensajeAceptado;

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

            VerificaEmail::dispatch();
            RegistroNoEditado::dispatch();

            $nuevoegre = DB::table('registro_egresado_nuevos')->where('Validacion', 'No')->get();
            $rechazoegre = DB::table('registro_egresado_nuevos')->where('Validacion', 'Rechazado')->get();
            //dd($usuarios);

            return view('administradora.indexegrenuevo', compact('nuevoegre', 'rechazoegre'));
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
        $existcne = DB::table('registro_egresado_nuevos')->where('email',$request->correo)->exists();        
        $existcne2 = DB::table('users')->where('email',$request->correo)->exists();        
        if ($existcne == true || $existcne2 == true) {            
            return redirect('/RegistroEgresado/create')->with('registro','Este correo ya se encuentra registrado');
        }else{

        
        $nuevoeg = new RegistroEgresadoNuevo;
        $nuevoeg->numero_control = $request->numerocontrol;
        $nuevoeg->nombres = $request->nombre;
        $nuevoeg->apellido_paterno = $request->apellidop;
        $nuevoeg->apellido_materno = $request->apellidom;
        $nuevoeg->email = $request->correo;
        $nuevoeg->Validacion = 'No';

       

        $nuser = new User;        
        $nuser->username=$request->nombre;
        $nuser->email = $request->correo;
        $nuser->origen = 'Pendiente';
        $nuser->password = bcrypt('12345678');
        $nuser->tipo = 1;
        $nuser->curriculo = 1;

        $nuevoeg->save();
        $nuser->save();
        event(new Registered($nuser));

        return view('layouts.aviso');
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

            $edituser = DB::table('users')->where('email',$usuario->email)->first();

            $user = User::findOrFail($edituser->id);

            //dd($user);   
            $user->origen = 'Egresado';         
            $user->username = $usuarioegre;
            $user->password = bcrypt($random_password);;            
              

            $correoeg = $usuario->email;

            // $data= array(
            //     'mensaje' => 'Ingresa',
            //     'direccion' => 'http://127.0.0.1:8000/BTEgresado',
            //     'usuario' => $usuarioegre,
            //     'contraseña' => $random_password,
            // );
   
            //     Mail::send('emails.webregistroemp',$data,function($msg) use ($correoeg){
            //         $msg->from('from@example.com', 'Bolsa de Trabajo ITTG');
   
            //         $msg->to($correoeg)->subject('Notificacion');
            //     });
            // //dd($correoem);
            $data1 = $usuarioegre;
            $data = $random_password;

            Mail::to($correoeg)->send(new MensajeAceptado($data1, $data));

           $usuario->save(); 
           $user->save();      

            return Redirect('/nuevoegresado');
            }else{
                abort(404, 'Página No Encontrada');
            }
    }

    public function edit2($id){   
        
        //dd($id);
        $exits = DB::table('registro_egresado_nuevos')->where('id',$id)->exists();
        //dd($exits); 
        if($exits == false){
            return redirect('/RegistroEgresado/create')->with('registro','Lo sentimos, tus datos ya no se encuentran disponibles. Registrate de nuevo.');
        } else{
            $editregistro = RegistroEgresadoNuevo::findOrFail($id);         
            //dd($id);
            return view('egresado.editregistro', compact('editregistro'));
        }        
        
    }

    public function edit3($id){   
        
        $editregistro = RegistroEgresadoNuevo::findOrFail($id);
        //dd($editregistro);

        return view('administradora.editregistrorecha', compact('editregistro'));
    
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
   
       $editregistro = RegistroEgresadoNuevo::findOrFail($id);
       //dd($editregistro);
        $editregistro->numero_control = $request->numerocontrol;
        $editregistro->nombres = $request->nombre;
        $editregistro->apellido_paterno = $request->apellidop;
        $editregistro->apellido_materno = $request->apellidom;
        $editregistro->email = $request->correo;
        $editregistro->Validacion = 'No';

        $editregistro->save();

        return redirect('/RegistroEgresado/create')->with('guardado','Los Datos se guardaron correctamente, en breve el administrador del sistema los revisara nuevamente.');
    }

    public function update2(Request $request, $id)
    {
        
        if(Auth::user()->origen == 'Administradora'){
            $editregistro = RegistroEgresadoNuevo::findOrFail($id);
       
            $editregistro->numero_control = $request->numerocontrol;
            $editregistro->nombres = $request->nombre;
            $editregistro->apellido_paterno = $request->apellidop;
            $editregistro->apellido_materno = $request->apellidom;
            $editregistro->email = $request->correo;
            $editregistro->save();

            $usuario = RegistroEgresadoNuevo::findOrFail($id);
            //dd($usuario->numero_control);
           
            $usuario->Validacion = 'Si'; 
            
            $usuarioegre = 'EG'.$usuario->numero_control;
            $random_password = Str::random(8);

            $edituser = DB::table('users')->where('email',$usuario->email)->first();

            $user = User::findOrFail($edituser->id);

            //dd($user);   
            $user->origen = 'Egresado';         
            $user->username = $usuarioegre;
            $user->password = bcrypt($random_password);;            
              

            $correoeg = $usuario->email;

            // $data= array(
            //     'mensaje' => 'Ingresa',
            //     'direccion' => 'http://127.0.0.1:8000/BTEgresado',
            //     'usuario' => $usuarioegre,
            //     'contraseña' => $random_password,
            // );
   
            //     Mail::send('emails.webregistroemp',$data,function($msg) use ($correoeg){
            //         $msg->from('from@example.com', 'Bolsa de Trabajo ITTG');
   
            //         $msg->to($correoeg)->subject('Notificacion');
            //     });
            // //dd($correoem);
            $data1 = $usuarioegre;
            $data = $random_password;

            Mail::to($correoeg)->send(new MensajeAceptado($data1, $data));

           $usuario->save(); 
           $user->save();      

            return Redirect('/nuevoegresado');
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
        //dd($id);
        if(Auth::user()->origen == 'Administradora'){
            $usuario = RegistroEgresadoNuevo::findOrFail($id);
            //dd($usuario);

            $fecharechazo = new \DateTime();
            $usuario->modificado = $fecharechazo->format('Y-m-d H:i:s');
            
            $usuario->validacion = 'Rechazado';

            $correoeg = $usuario->email;
            $correoadmin = Auth::user()->email;

            $buscauser = DB::table('users')->where('email',$usuario->email)->first();

            $eliminaruser = User::findOrFail($buscauser->id);

            //dd($eliminaruser);

            //dd($correoadmin);
              $data1 = $correoadmin;
              $data ='https://bolsadetrabajo.tuxtla.tecnm.mx/editardatos/'.$id.'/registroegresado';

            
   
            //     Mail::send('emails.webrechazoegre',$data,function($msg) use ($correoeg){
            //         $msg->from('from@example.com', 'Bolsa de Trabajo ITTG');
   
            //         $msg->to($correoeg)->subject('Notificacion');
            //     });
            // //dd($correoem);
                            
            Mail::to($correoeg)->send(new MensajeRechazado($data1, $data));
                

            $usuario->save();
            // $eliminaruser->delete();
            
            return Redirect('/nuevoegresado');
            }else{
                abort(404, 'Página No Encontrada');
            }

    }
}
