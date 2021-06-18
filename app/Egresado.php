<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{

    protected $table='egresado';
    protected $primaryKey='idegresado';
	public $timestamps=false;

	protected $fillable =[
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'domicilio',
        'colonia',
        'fecha_de_nac',
        'numero_cel',
        'solicitudperfil_id',
        'estado_id',
        'localidad_id',
        'pais_id',
        'imagen',
        'genero_id'
        
    ];

    public function genero(){
        return $this->belongsTo("App\Genero", "genero_id", "idgenero");
    }

    public function perfiles(){
        return $this->belongsTo("App\Perfil", "perfiles_id", "idperfiles");
    }

    public function pais(){
        return $this->belongsTo("App\Pais", "pais_id", "idpais");
    }

    public function estado(){
        return $this->belongsTo("App\Estado", "estado_id", "idestado");
    }

    public function municipio(){
        return $this->belongsTo("App\Municipio", "municipio_id", "idmunicipio");
    }

    public function perfil(){
        return $this->belongsToMany('Solicitud\Solicitudperfil');
    }

    public function user(){
        return $this->belongsTo("App\User","users_id","id");
    }

    public function scopeName($query, $email){
		//dd("scope: " . $titulo);
 		if(trim($email) != ""){
			$query->where('nombres', 'LIKE', '%'.$email.'%' );

 		}
 		

 	}
}

