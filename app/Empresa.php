<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Estado;

class Empresa extends Model
{
  protected $table='empresas';
  protected $primaryKey='idempresa';
	public $timestamps=false;

	protected $fillable =[
        'nombre',
        'names',
        'apellido_paterno',
        'apellido_materno',
        'cargo',
        'email',
        'rfc',
        'descripcion',
        'colonia',
        'calle',
        'numeroexterior',
        'codigo_postal',
        'telefono',
        'esrado_id',
        'localidad_id',
        'pais_id',
        'imagen',
    ];

    public function estado(){
      return $this->belongsTo('App\Estado', 'estado_id', 'idestado');
    }

    public function municipio(){
      return $this->belongsTo('App\Municipio', 'municipio_id', 'idmunicipio');
    }

    public function pais(){
      return $this->belongsTo("App\Pais", "pais_id", "idpais");
  }

  public function user(){
    return $this->belongsTo("App\User","users_id","id");
  }
}
