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
use DB;


class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa = Empresa::all();
        if($empresa == null){
            return view('empresa.inicio', compact('empresa'));
        }

        else{
        $usuario = Auth::user()->id;
        //dd($usuario);
        $empresa = Empresa::select('idempresa')->where('users_id', $usuario)->get()->pluck('idempresa');
        $empresas = array_flatten($empresa);
        return view('empresa.inicio', compact('empresas'));
      }
  }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        if(Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/empresas/',$file->getClientOriginalName());
            $empresa->imagen=$file->getClientOriginalName();
        }

        $empresa->save();
        return redirect()->route('empresa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo = $id;
        //dd($tipo);
        $usuario = Auth::user()->id;
       // dd($usuario);
        $empresa = Empresa::select('idempresa')->where('users_id', $usuario)->get();
       // dd($empresa);
        $empresas = array_flatten($empresa);
        //-------------------------------
        $empresa = Empresa::find($tipo);
        //dd($empresa);
        return view('empresa.show', compact('empresa','empresas'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Auth::user()->id;
        $empresa = Empresa::select('idempresa')->where('users_id', $usuario)->get()->pluck('idempresa');
        $empresas = array_flatten($empresa);

        $estados = Estado::all();
        $localidades = Municipio::all();
        $empresa = Empresa::find($id);
        return view('empresa.editar', compact('empresa', 'estados','localidades','empresas'));
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
        $empresa = Empresa::findOrFail($id);
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
        $empresa->save();
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
    }

    public function nuevo(){
        $usuario = Auth::user()->id;
        $empresa = Empresa::select('idempresa')->where('users_id', $usuario)->get()->pluck('idempresa');
        $empresas = array_flatten($empresa);

        $estados = Estado::all();
        $localidades = DB::table('municipio')->get();
        $paises = Pais::all();
        //dd($localidades);
        return view('empresa.crear',compact('localidades','estados','paises', 'empresas'));
    }

    public function getMunicipio(Request $request, $id){
        if($request->ajax()){
            $municipio = Municipio::municipios($id);
            return response()->json($municipio);
        }
    }
}