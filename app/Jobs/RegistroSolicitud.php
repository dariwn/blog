<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Egresado;
use DateTime;
use Carbon\Carbon; 
use App\User;
use DB;
use App\Solicitudperfil;
use App\Mail\MensajeSolicitud;

class RegistroSolicitud implements ShouldQueue
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
        $aviso = Solicitudperfil::whereDate('created_at', '=',new \DateTime('today'))->get();
        foreach($aviso as $perfil){
            $obtenperfil = $perfil->idperfiles;
            //echo $obtenperfil;
            $obtencorreo = DB::table('egresado')->where('perfiles_id', $obtenperfil)->get();
            //dd($obtencorreo);
            foreach($obtencorreo as $correo){
                $correoobt = $correo->correo;
                //echo $correoobt;
                //envio correo
                $data1 = 'https://bolsadetrabajo.tuxtla.tecnm.mx/BTEgresado';
                Mail::to($correoobt)->send(new MensajeSolicitud($data1));
                
            }
        }
        //dd($aviso);
    }
}
