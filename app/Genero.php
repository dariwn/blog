<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table='sexo';
    protected $primaryKey='idgenero';
	public $timestamps=false;

	protected $fillable =[
        'sexo',
    ];
}