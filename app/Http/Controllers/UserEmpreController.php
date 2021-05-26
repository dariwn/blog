<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Auth;
use DB;
use App\Empresa;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

use App\Mail\MensajeCambioUsuario;

class UserEmpreController extends Controller
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
        $usuarios = User::name($request->get('username'))->where('origen','Empresa')->get();
        //dd($usuarios);
        return view('adminusuarios.indexem', compact('usuarios'));
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
        if(Auth::user()->origen == 'Empresa'){ 
        $usuario = User::findOrFail($id);
        //dd($usuario);
        $usuario1 = Auth::user()->id;
        $empresa = Empresa::select('idempresa')->where('users_id', $usuario1)->get()->pluck('idempresa');
        $empresas = Arr::flatten($empresa);

        return view('empresa.editusuario', compact('usuario','empresas'));
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
        //        
        if(Auth::user()->origen == 'Administradora'){
        $usuario = User::findOrFail($id);
        //dd($usuario);
        return view('adminusuarios.editem', compact('usuario'));
        }else{
            abort(404, 'Página No Encontrada');
        }

    }

    public function edit2($id){
        if (Auth::user()->origen == 'Empresa') {
            $user = DB::table('users')->where('id',$id)->get();
            //dd($user);
            $usuario1 = Auth::user()->id;
            $empresa = Empresa::select('idempresa')->where('users_id', $usuario1)->get()->pluck('idempresa');
            $empresas = Arr::flatten($empresa);
            return view('empresa.editcorreo', compact('user','empresas'));
        }else{
            abort(404,'Pagina No Encontrada');
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
        if(Auth::user()->origen == 'Empresa'){
            $usuario = User::findOrFail($id);

            $contraseña = $request->contraseña;
            $usuario->username = $request->username;
            $usuario->password =  bcrypt($request->contraseña);

             //correo de aviso cambio de usuario
         
                $correoeg = $usuario->email;

                // $data= array(
                //     'mensaje' => 'Ingresa',
                //     'direccion' => 'http://127.0.0.1:8000/BTEmpresa',
                //     'usuario' => $request->username,
                //     'contraseña' => $contraseña,
                // );

                //     Mail::send('emails.webcambioUser',$data,function($msg) use ($correoeg){
                //         $msg->from('from@example.com', 'Bolsa de Trabajo ITTG');

                //         $msg->to($correoeg)->subject('Notificacion');
                //     });

                $data1 = $request->username;
                $data = $contraseña;
        
                Mail::to($correoeg)->send(new MensajeCambioUsuario($data1, $data));
                //dd($correoem);

            $usuario->save();
            return redirect('/empresa');
        }
        if(Auth::user()->origen == 'Administradora'){
        $usuario = User::findOrFail($id);

        $contraseña = $request->contraseña;

        $usuario->username = $request->username;
        $usuario->password =  bcrypt($request->contraseña);
        $usuario->email = $request->email;

         //correo de aviso cambio de usuario
         
         $correoeg = $usuario->email;

        //  $data= array(
        //      'mensaje' => 'Ingresa',
        //      'direccion' => 'http://127.0.0.1:8000/BTEmpresa',
        //      'usuario' => $request->username,
        //      'contraseña' => $contraseña,
        //  );

        //      Mail::send('emails.webcambioUser',$data,function($msg) use ($correoeg){
        //          $msg->from('from@example.com', 'Bolsa de Trabajo ITTG');

        //          $msg->to($correoeg)->subject('Notificacion');
        //      });
        // //dd($correoem);
        $data1 = $request->username;
        $data = $contraseña;

        Mail::to($correoeg)->send(new MensajeCambioUsuario($data1, $data));

        $usuario->save();
        return redirect('/usuarios-empresa');
        //dd($usuario);
        }else{
            abort(404, 'Página No Encontrada');
        }
    }

    public function update2(Request $request,$id){
        
        $user = User::findOrFail($id);        
        //dd($user);
        $user->email = $request->email;
        $user->email_verified_at = null;
        $userid = Auth::user()->id;
        $Ucorreo1 = Empresa::select('idempresa')->where('users_id', $userid)->first();

        //dd($Ucorreo1);
        $Ucorreo = Empresa::findOrFail($Ucorreo1->idempresa); 
        //dd($Ucorreo); 
        $Ucorreo->email =$request->email;
        
        // dd($Ucorreo[0]->email);
        $Ucorreo->save();
        $user->save();
        
        return redirect()->route('empresa.index');
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
