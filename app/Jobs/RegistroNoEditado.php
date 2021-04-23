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

class RegistroNoEditado implements ShouldQueue
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
        //
        //inicio de eliminacion si el egresado fue rechazado y no edita su registro
        $editrechazo = DB::table('registro_egresado_nuevos')->where('Validacion','Rechazado')->get();
            
        foreach($editrechazo as $rechazo){
            
            $fechaactual = new \DateTime();
            $fechaactual->format('Y-m-d');

            $fechamodi = date_create($rechazo->modificado);
            $fechaactualizado = date_create($rechazo->updated_at);

            $interval = date_diff($fechamodi, $fechaactualizado);
            $difdias = $interval->format('%R%a días');
            if( $difdias == 0 ){
                //echo 'fechas iguales';                       
                $fechahoy = date('Y-m-d');
                $fechahoy2 = new DateTime($fechahoy);
                $fechaactualizado2 = new DateTime($rechazo->updated_at);

                $interval2= $fechaactualizado2->diff($fechahoy2);

                if($interval2->format('%R%a días') >= 3){
                    //echo "mayor a 3 dias"; //eliminacion del que tenga mas de 3 dias
                    $eliminaruser = DB::table('users')->where('email',$rechazo->email)->first();
                    $eliminaruser2 = User::findOrFail($eliminaruser->id);
                    $eliminarreg = RegistroEgresadoNuevo::findOrFail($rechazo->id);
                   
                    $eliminarreg->delete();
                    $eliminaruser2->delete();

                    //Log::info("registro rechazado sin editar eliminado");
                }else{
                    //sino tiene 3 dias no hace nada
                }
            }
        }

        //fin
    }
}
