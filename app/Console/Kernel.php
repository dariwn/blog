<?php

namespace App\Console;

use App\RegistroEgresadoNuevo;
use App\User;
use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function () {
            //eliminar users sin verificar email
            $correonoverify = DB::table('users')->where('email_verified_at', null)->get();
            foreach($correonoverify as $datos){
                $registronuevos = DB::table('registro_egresado_nuevos')->where('email',$datos->email)->first();
                $eliminarreg = RegistroEgresadoNuevo::findOrFail($registronuevos->id);
                $eliminaruser = User::findOrFail($datos->id);
                $eliminaruser->delete();
                $eliminarreg->delete();
            }
        })->weekly(); //elimina cada domingo alas 00:00

        $schedule->call(function (){
            
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
                    }else{
                        //sino tiene 3 dias no hace nada
                    }
                }
            }

        })->daily();//elimina cada domingo alas 00:00
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
