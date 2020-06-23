<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table='estado';
    protected $primaryKey='idestado';
	public $timestamps=false;

	protected $fillable =[
        'pais_idpais',
        'nombre_estado',
        'idempresa',
    ];
}

