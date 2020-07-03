<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMunicipioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('municipio', function(Blueprint $table)
		{
			$table->integer('idmunicipio', true);
			$table->integer('estado_idestado')->index('fk_municipio_estado1_idx');
			$table->char('nombre_localidad', 60);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('municipio');
	}

}
