<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DateTime;
use Carbon\Carbon; 
use App\RegistroEgresadoNuevo;
use App\User;
use DB;

class VerificaCorreo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Verifica:Correo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'verifica correo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //eliminar users sin verificar email
        $correonoverify = DB::table('users')->where('email_verified_at', null)->get();
        foreach($correonoverify as $datos){                            
            
            $fechahoy = date('Y-m-d');
            $fechahoy2 = new DateTime($fechahoy);
            $fechaactualizado = new DateTime($datos->updated_at);

            $intervalcorreo= $fechaactualizado->diff($fechahoy2);
            
            if($intervalcorreo->format('%R%a días') >= 3){

                $registronuevos = DB::table('registro_egresado_nuevos')->where('email',$datos->email)->first();
                $eliminarregcorreo = RegistroEgresadoNuevo::findOrFail($registronuevos->id);
                $eliminarusercorreo = User::findOrFail($datos->id);
                $eliminarusercorreo->delete();
                $eliminarregcorreo->delete();

                Log::info("correo sin verificar eliminado");
            }else{

            }
            
        }
        //fin de eliminar user sin verificar correo
    }
}
