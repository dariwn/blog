<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    protected $table='curriculo';
    protected $primaryKey='idcurriculo';
	public $timestamps=false;

	protected $fillable =[
        'idegresado',
        'ididioma',
        'habilidades',
        'especialidad',
        'escuela',
        'area',
        'duracion',
        'idjerarquia',
    ];

    public function curriculo(){
        return $this->belongsTo("App\Egresado","idegresado","idegresado");
    }

    public function perfil(){
        return $this->belongsTo("App\Perfil","idperfiles","idperfiles");
    }

    public function municipio(){
        return $this->belongsTo("App\Municipio","idmunicipio","idmunicipio");
    }

    public function estado(){
        return $this->belongsTo("App\Estado","idestado","idestado");
    }

    public function idioma(){
        return $this->belongsTo("App\Idioma","ididioma","ididioma");
    }

    public function nivel(){
        return $this->belongsTo("App\Jerarquia","idjerarquia","idjerarquia");
    }
}
