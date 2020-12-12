<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;

use Auth;
use Session;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->origen=='Egresado'){
            return Redirect::to('/egresado');
        }else

        if (Auth::user()->origen == 'Administradora'){
            return view('administradora.inicio3');
        }else

        if (Auth::user()->origen == 'Empresa'){
            return Redirect::to('empresa');
        }
    }
}
