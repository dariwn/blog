<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroEgresadoNuevo extends Model
{
    protected $fillable =[
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'validacion'
    ];
}
