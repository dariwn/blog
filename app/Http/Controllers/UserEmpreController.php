<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Auth;
use DB;
use App\Empresa;
use Illuminate\Support\Arr;



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

            $usuario->username = $request->username;
            $usuario->password =  bcrypt($request->contraseña);

            $usuario->save();
            return redirect('/empresa');
        }
        if(Auth::user()->origen == 'Administradora'){
        $usuario = User::findOrFail($id);

        $usuario->username = $request->username;
        $usuario->password =  bcrypt($request->contraseña);

        $usuario->save();
        return redirect('/usuarios-empresa');
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
        //
        abort(404, 'Página No Encontrada');
    }
}
