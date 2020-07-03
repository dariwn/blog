<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEgresadosolicitudTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('egresadosolicitud', function(Blueprint $table)
		{
			$table->foreign('idegresado', 'fk_egresadosolicitud_egresado1')->references('idegresado')->on('egresado')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idempresa', 'fk_egresadosolicitud_empresas1')->references('idempresa')->on('empresas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idsolicitud', 'fk_egresadosolicitud_solicitud1')->references('idsolicitud')->on('solicitud')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('egresadosolicitud', function(Blueprint $table)
		{
			$table->dropForeign('fk_egresadosolicitud_egresado1');
			$table->dropForeign('fk_egresadosolicitud_empresas1');
			$table->dropForeign('fk_egresadosolicitud_solicitud1');
		});
	}

}
