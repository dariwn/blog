<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table='perfiles';
    protected $primaryKey='idperfiles';
	public $timestamps=false;

	protected $fillable =[
		'carrera',
    ];
    
}