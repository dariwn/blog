<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use DateTime;
use Carbon\Carbon; 
use App\RegistroEgresadoNuevo;
use App\User;
use DB;


class VerificaEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //eliminar users sin verificar email
        $correonoverify = DB::table('users')->where('email_verified_at', null)->get();

	//dd($correonoverify);
        foreach($correonoverify as $datos){  

	if($datos->origen == 'Empresa'){

	}else{                          
		
	//dd($datos);

            $fechahoy = date('Y-m-d');
            $fechahoy2 = new DateTime($fechahoy);
            $fechaactualizado = new DateTime($datos->updated_at);

            $intervalcorreo= $fechaactualizado->diff($fechahoy2);
            
            if($intervalcorreo->format('%R%a días') >= 30){

		
		$registronuevos = DB::table('users')->where('email',$datos->email)->first();
		//dd($registronuevos);
                //$registronuevos = DB::table('registro_egresado_nuevos')->where('email','=' ,$datos->email)->get();
		//dd($registronuevos);

		if (RegistroEgresadoNuevo::where('email', '=',$registronuevos->email )->exists()) {

		$registronuevos1 = DB::table('registro_egresado_nuevos')->where('email','=' ,$datos->email)->first();
		//dd($registronuevos1);

		$eliminarregcorreo =  RegistroEgresadoNuevo::find($registronuevos1->id);
		//dd($eliminarregcorreo);
		
		$eliminarregcorreo->delete();

		}else{
		
		}

                //$eliminarregcorreo = RegistroEgresadoNuevo::findOrFail($registronuevos->email);
		//dd($eliminarregcorreo);
 
                $eliminarusercorreo = User::findOrFail($datos->id);

		//dd($eliminarusercorreo);
                $eliminarusercorreo->delete();
               // $eliminarregcorreo->delete();

                //Log::info("correo sin verificar eliminado");
            }else{

            }
            
        }
	}
        //fin de eliminar user sin verificar correo
    }
}
