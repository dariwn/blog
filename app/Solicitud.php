<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table='solicitud';
    protected $primaryKey='idsolicitud';
    public $timestamps = true;

    protected $fillable = [
        'id_empresa',
        'nombredelpuesto',
        'cargo',
        'salario',
        'horario',
        'edades',
        'descripcion_del_puesto',
        'experiencia',
        'tiempo_de_contratacion',
        'cambio_de_residencia',
        'sexo',
        'estado_civil',
        'requisito',
        'estatus',
    ];

    public function genero(){
        return $this->belongsTo("App\Genero", "idsexo", "idgenero");
    }
}
