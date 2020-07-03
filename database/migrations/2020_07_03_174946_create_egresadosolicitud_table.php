<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEgresadosolicitudTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('egresadosolicitud', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idsolicitud')->index('fk_egresadosolicitud_solicitud1_idx');
			$table->integer('idegresado')->index('fk_egresadosolicitud_egresado1_idx');
			$table->integer('idempresa')->index('fk_egresadosolicitud_empresas1_idx');
			$table->char('estatus', 30)->nullable();
			$table->char('comentario', 250)->nullable();
			$table->string('curriculum', 50)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('egresadosolicitud');
	}

}
