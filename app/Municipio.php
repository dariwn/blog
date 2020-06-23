<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table='municipio';
    protected $primaryKey='idmunicipio';
	public $timestamps=false;

	protected $fillable =[
        'estado_idestado',
        'nombre_localidad',
    ];

    public static function municipios($id){
        return Municipio::where('estado_idestado','=',$id)
        ->get();
    }
}
