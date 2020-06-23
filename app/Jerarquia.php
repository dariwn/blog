<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jerarquia extends Model
{
    protected $table='jerarquia';
    protected $primaryKey='idjerarquia';
	public $timestamps=false;

	protected $fillable =[
       'nivel',
    ];
}
