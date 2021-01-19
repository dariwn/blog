<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;

use Auth;
use Session;
use App\User;
use DB;

class loginController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
             $username = $request->username;
             $password = $request->password;

            $user= User::where('username', '=', $username)->first();
            //dd($user);
            //dd($password);
            //dd(Hash::check($password, $user->password));
            
            //$exist = User::where('username', '=',$username, 'AND','password', '=', $password )->first();

             //dd($user);
            // $exist = DB::table('users')->where('username',$username)->get();
            //dd($exist->origen);

            if(Hash::check($password, $user->password) == true ){
                if($user->origen == 'Administradora'){
                    Auth::login($user);
                    return view('administradora.inicio3');
                }else{
                    return back()->with('message','Correo o Contraseña Invalido');
                }
            }else{

            }

            
            
            // if(Auth::attempt(['username'=>$request['username'],'password'=>$request['password']])){
            //     if (Auth::user()->origen=='Administradora'){
            //         return view('administradora.inicio');
            //     }else{
            //         return back()->with('message','Correo o Contraseña Invalido');
            //     }
            // }
        }
        return view('administradora.login');
    }

    public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'username';
    } 

    public function logout()
    {
        Auth::logout();
        return redirect('/BTAdministradora')->with('flash_message_success','Sesion Finalizada');
    }
}