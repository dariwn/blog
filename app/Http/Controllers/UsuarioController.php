<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User;
use App\Egresado;
use DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use App\Mail\MensajeAceptado;
use Illuminate\Support\Facades\Mail;

class UsuarioController extends Controller
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
        if(Auth::user()->origen == 'Administradora'){
        $egresado = Egresado::paginate(7);
        return view('administradora.datos', compact('egresado')); 
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
        if(Auth::user()->origen == 'Administradora'){
            $existe = 'No';
        return view('usuario.crear', compact('existe'));
        }else{
            abort(404, 'Página No Encontrada');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->origen == 'Administradora'){

        $correo = DB::table('users')->where('email',$request->email)->exists();
        //dd($correo);
        if($correo == true){
            $existe = 'Si';
            return view('usuario.crear', compact('existe'));
        }else{
            $comando = new User;

            $random_user = Str::random(8);
            $random_pass = Str::random(9);
            $correoeg = $request->email;
            $comando->password = bcrypt($random_pass);
            $comando->username = 'EG'.$random_user;
            $comando->email =$request->email;
            $comando->tipo = "1";
            $comando->curriculo = "1";
            $comando->origen = "Egresado";
            $comando->save();

            $data1 = 'EG'.$random_user;
            $data = $random_pass;

            Mail::to($correoeg)->send(new MensajeAceptado($data1, $data));
            event(new Registered($comando));

            $existe = 'No';
            return view('usuario.crear', compact('existe'));
            
        }
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
