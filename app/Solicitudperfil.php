<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitudperfil extends Model
{
    protected $table='solicitudperfil';
    protected $primaryKey='id';
    public $timestamps = false;

    protected $fillable = [
        'idsolicitud',
        'idperfiles',
    ];

    public function genero(){
        return $this->belongsTo("App\Genero", "idsexo", "idgenero");
    }
}
