<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egresadosolicitud extends Model
{
    protected $table='egresadosolicitud';
    protected $primaryKey='id';
	public $timestamps=true;

	protected $fillable =[
        'idsolicitud',
        'idegresado',
        'idempresa',
        'estatus',
        'comentario',
        'curriculum',
    ];
    
    public function solicitud(){
        return $this->belongsTo("App\Solicitud", "idsolicitud");
    }

    public function egresado(){
        return $this->belongsTo("App\Egresado", "idegresado");
    }

    public function empresa(){
        return $this->belongsTo("App\Empresa", "idempresa");
    }

    public function perfil(){
        return $this->belongsToMany('Solicitud\Solicitudperfil');
    }
    
    public function genero(){
        return $this->belongsTo("App\Genero", "idsexo", "idgenero");
    }
}
