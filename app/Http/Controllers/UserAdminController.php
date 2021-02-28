<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Auth;
use DB;
use Illuminate\Auth\Events\Registered;

class UserAdminController extends Controller
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
        $usuarios = User::name($request->get('username'))->where('origen','Administradora')->get();
        //dd($usuarios);
        return view('adminusuarios.indexadmin', compact('usuarios'));
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
        if(Auth::user()->origen == 'Administradora'){
        return view('adminusuarios.createadmin');
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
        //
        if(Auth::user()->origen == 'Administradora'){
        $usuario = new User;

        $usuario->origen = "Administradora";
        $usuario->username = $request->username;
        $usuario->password =  bcrypt($request->contraseña);
        $usuario->tipo= "0";
        $usuario->curriculo = "0";
        $usuario->email = $request->correo;

        $usuario->save();
        event(new Registered($usuario));

        return redirect('/usuarios-sistema');
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
        if(Auth::user()->origen == 'Administradora'){
            //dd($id);
            $usuario = User::findOrFail($id);
            return view('administradora.editcorreo', compact('usuario'));
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
        return view('adminusuarios.editadmin', compact('usuario'));
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
        if(Auth::user()->origen == 'Administradora'){
        $usuario = User::findOrFail($id);

        $usuario->username = $request->username;        
        $usuario->password =  bcrypt($request->contraseña);

        $usuario->save();
        return redirect('/usuarios-sistema');
        }else{
            abort(404, 'Página No Encontrada');
        }
        //dd($usuario);
    }

    public function update2(Request $request,$id)
    {
        if(Auth::user()->origen== 'Administradora'){
            $usuario = User::findOrFail($id);
            //dd($usuario);

            $usuario->email = $request->email;

            $usuario->save();
            return redirect('home');
        }else{
            abort(404, 'Pagina No Encontrada');
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
        if(Auth::user()->origen == 'Administradora'){
            $usuario = User::findOrFail($id);
            //dd($usuario);
            
            //eliminar el usuario
            if($usuario->delete()){
                return redirect('/usuarios-sistema');
            }else{
                return response()->json([
                    'mensaje' => 'Error al eliminar el usuario'
                ]);
            }
        }else{
            abort(404, 'Página No Encontrada');
        }
    }
}
